<template>
    <div v-if="requestsCount>0" class="loading-modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="spinner"></div>
            <div class="loading-text">
                <p class="typewriter">
                    دریافت اطلاعات شخصی...
                </p>
            </div>
        </div>
    </div>
    <div class=" pt-3">
        <h1></h1>
        <form>
            <div class="flex items-start ">
                <span class="text-orange-500 pl-1 pt-px">◼</span>
                <h2 class="text-base font-bold ">اطلاعات‌ شخصی</h2>
                <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="flex flex-wrap mt-3">
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative flex items-center justify-center mx-auto mb-2 ">


                        <div v-if="!imageSrc" class="form-control w-full max-w-md">
                            <form @submit.prevent="submitForm">

                                <label class="label">
                                    <span class="label-text">لطفا تصویر پرسنلی خود را از کادر زیر انتخاب کرده و بر روی دکمه بارگذاری کلیک نمایید. (دکمه بارگذاری پس از انتخاب عکس نمایش داده می‌شود)</span>
                                </label>
                                <br><br>
                                <input type="file" name="file" ref="fileInput" accept=".jpg,.jpeg,.bmp,.png"
                                       @change="this.showButton=true"
                                       class="file-input file-input-bordered w-full max-w-xs mb-3"/>

                                <label class="label mb-3">
                                    <span class="label-text-alt">حداکثر حجم فایل: 2 مگابایت</span>
                                    <br>
                                    <span class="label-text-alt">با پسوندهای: png-jpg-jpeg-bmp</span>
                                    <br>
                                    <span class="label-text-alt ">حداقل عرض و ارتفاع عکس: 128px*128px</span>
                                    <br>
                                    <span class="label-text-alt ">حداکثر عرض و ارتفاع عکس: 600px*600px</span>

                                </label>
                                <br>
                                <button type="submit" v-if="showButton"
                                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">
                                    بارگذاری
                                </button>

                            </form>
                        </div>

                        <img v-else :src="imageSrc" class="rounded-3xl w-32 h-32 object-cover"
                             alt="عکس کاربر">

                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">نام</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3 bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                personalInfo['name']
                            }}</label>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">نام پدر</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3 bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                personalInfo['father_name']
                            }}</label>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">نام
                            خانوادگی</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                personalInfo['family']
                            }}</label>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">کد ملی</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                personalInfo['national_code']
                            }}</label>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">تاریخ
                            تولد</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                personalInfo['birthdate']
                            }}</label>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">جنسیت</label>
                        <label v-if="personalInfo['gender']==='مرد'"
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                مذکر
                            </label>
                        <label v-else-if="personalInfo['gender']==='زن'"
                               class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                مونث
                            </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "personalinfo",
    props: ['token'],
    data() {
        return {
            personalInfo: [],
            requestsCount: 0,
            imageSrc: '',
            confirm: false,
            showButton: false
        };
    },
    methods: {
        submitForm() {
            const fileInput = this.$refs.fileInput;
            if (this.$refs.fileInput.files.length) {
                const file = fileInput.files[0];
                const formData = new FormData();
                formData.append('file', file);
                if (confirm('آیا از بارگذاری عکس انتخاب شده مطمئن هستید؟ \n این عملیات قابل بازگشت نیست!')) {

                    axios.post(`/upload/${this.token}`, formData,{
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => {
                            switch (response.data) {
                                case "The file field has invalid image dimensions.":
                                    alert('سایز تصویر اشتباه است.');
                                    return false;
                                    break;
                                case 'The file field must not be greater than 2048 kilobytes.':
                                    alert('حجم فایل تصویر بزرگتر از 2 مگابایت است.');
                                    return false;
                                    break;
                                case 'The file field must be an image.':
                                    alert('فایل تصویر نامعتبر است.');
                                    return false;
                                    break;
                                case 'The file field must be a file of type: jpeg, png, jpg, bmp.':
                                    alert('فرمت فایل تصویر نامعتبر است.');
                                    return false;
                                    break;
                                default:
                                    location.reload();
                            }
                        })
                        .catch(error => {
                            console.log(error.response.data);

                        });
                }
            } else {
                alert('فایل انتخاب نشده است.');
            }
        },
    },
    mounted() {
        axios.get('/getpersonalinfo/this/'+this.token,{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                this.personalInfo = response.data[0];
            })
            .catch(error => {

            });

        axios.get(`/getprofileimage/this/${this.token}`,{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (response.data.imageSrc) {
                    this.imageSrc = response.data.imageSrc;
                }
            })
            .catch(error => {

            }).finally(() => {
        });



    }
}
</script>

<style scoped>

</style>
