<template>
    <div>
        <h1></h1>
        <form>
            <div class="flex items-center ">
                <span class="text-orange-500 pl-4">◼</span>
                <h3 class="text-lg font-bold ">اطلاعات‌ شخصی</h3>
                <hr class="w-full border-t-2 border-b-orange mr-4">
            </div>
            <div class="flex flex-wrap mt-5">
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative flex items-center justify-center mx-auto mb-2 ">


                        <div v-if="!imageSrc" class="form-control w-full max-w-xs">
                            <form @submit.prevent="submitForm">

                                <label class="label">
                                    <span class="label-text">لطفا تصویر پرسنلی خود را از کادر زیر انتخاب کرده و بر روی دکمه بارگذاری کلیک نمایید</span>
                                </label>
                                <br><br>
                                <input type="file" name="file" ref="fileInput" accept=".jpg,.jpeg,.bmp,.png"
                                       class="file-input file-input-bordered w-full max-w-xs"/>

                                <label class="label">
                                    <span class="label-text-alt">حداکثر حجم فایل: 2 مگابایت</span>
                                    <br>
                                    <span class="label-text-alt">با پسوندهای: png-jpg-jpeg</span>
                                    <br>
                                    <span class="label-text-alt">حداقل عرض و ارتفاع عکس: 128px*128px</span>
                                </label>
                                <br>
                                <button type="submit"
                                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">
                                    بارگذاری
                                </button>

                            </form>
                        </div>

                        <img v-else :src="imageSrc" class="rounded-3xl w-32 h-32 object-cover" src="{{ }}"
                             alt="عکس کاربر">

                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">نام</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3 bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                datapersonal.FirstName
                            }}</label>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">نام پدر</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3 bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                datapersonal.FatherName
                            }}</label>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">نام
                            خانوادگی</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                datapersonal.LastName
                            }}</label>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">کد ملی</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                datapersonal.SocialID
                            }}</label>
                    </div>
                </div>
                <!--                <div class="w-full lg:w-4/12 px-4 flex-row">-->
                <!--                    <div class="relative w-full mb-3">-->
                <!--                        <label class="block uppercase  text-xs font-bold mb-2">شماره-->
                <!--                            شناسنامه</label>-->
                <!--                        <label-->
                <!--                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{-->
                <!--                            }}</label>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">تاریخ
                            تولد</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                datapersonal.Birthdate
                            }}</label>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-xs font-bold mb-2">جنسیت</label>
                        <label
                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{
                                datapersonal.Gender
                            }}</label>
                    </div>
                </div>
                <!--                <div class="w-full lg:w-4/12 px-4 flex-row">-->
                <!--                    <div class="relative w-full mb-3">-->
                <!--                        <label class="block uppercase  text-xs font-bold mb-2">صادره از</label>-->
                <!--                        <label-->
                <!--                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{-->
                <!--                                datapersonal.Sodor-->
                <!--                            }}</label>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="w-full lg:w-4/12 px-4 flex-row">-->
                <!--                    <div class="relative w-full mb-3">-->
                <!--                        <label class="block uppercase  text-xs font-bold mb-2">ملیت</label>-->
                <!--                        <label-->
                <!--                            class="cursor-not-allowed border border-colorborder px-3 py-3   bg-c-gray rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{-->
                <!--                            }}</label>-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "personalinfo",
    props: ['datapersonal'],
    data() {
        return {
            imageSrc: '',
            datapersonals: [],
            confirm: false,
        };
    },
    methods: {
        submitForm() {
            const fileInput = this.$refs.fileInput;
            const file = fileInput.files[0];

            const formData = new FormData();
            formData.append('file', file);
            const nationalID = this.datapersonal['SocialID'];
            if (confirm('آیا از بارگذاری عکس انتخاب شده مطمئن هستید؟ \n این عملیات قابل بازگشت نیست!')) {

                axios.post(`/api/upload/${nationalID}`, formData)
                    .then(response => {
                        console.log(response.data);
                        location.reload();
                    })
                    .catch(error => {
                        // console.log(error.response.data);
                    });
            }
        },

    },
    mounted() {
        axios.get(`/api/getprofileimage/this/0371714941`)
            .then(response => {
                this.imageSrc = response.data.imageSrc;
            })
            .catch(error => {
                console.log(error)
            });
    }
}
</script>

<style scoped>

</style>
