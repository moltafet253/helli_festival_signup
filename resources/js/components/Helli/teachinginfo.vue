<template>
    <div>
        <form class="mt-8">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span>
                <h2 class="text-base font-bold  ">اطلاعات ‌تدریس</h2>
                <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="w-full lg:w-4/12 px-4 flex-row">
                <div class="relative w-full mb-3">
                    <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">استاد می
                        باشید؟</label>
                    <select v-model="item.isMaster" v-for="(item, index) in teaching"
                        class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                        <option selected value="خیر" v-bind:selected="item.term=='خیر'">خیر</option>
                        <option value="بله" v-bind:selected="item.term=='بله'">بله</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap mt-5">

                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">کد
                            استادی<span
                                style="color: red;">*</span></label>
                        <input type="text" v-for="(item, index) in teaching" :key="index"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.masterCode">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">استان و شهر محل
                            تدریس<span
                                style="color: red;">*</span></label>
                        <select
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option v-for="province in provinces" :value="province.id">{{ province.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نام محل
                            تدریس<span
                                style="color: red;">*</span></label>
                        <input type="text" v-for="(item, index) in teaching" :key="index"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.teachingPlaceName">
                    </div>
                </div>

                <div class="w-full mt-4">
                    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">ذخیره</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "teachinginfo",
    props: ['nationalcode'],
    data() {
        return {
            teaching: [],
            provinces: [],

        }
    },
    mounted() {
        axios.get(`/api/teaching/${this.nationalcode}/`)
            .then(response => {
                this.teaching = response.data;
            })
            .catch(error => {
                console.log(error)
            })
    },
    created() {
        axios.get('/api/provinces')
            .then(response => {
                this.provinces = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        // handleSubmit() {
        //     let mobile = this.contact[0]['mobile'];
        //     if (mobile == '' || mobile == null) {
        //         alert('شماره همراه وارد نشده است.');
        //     } else if (mobile.length < 11 || mobile.length > 11) {
        //         alert('شماره همراه در فرمت اشتباه وارد شده است.');
        //         return false;
        //     } else {
        //         axios.post(`/api/contact/save/${this.nationalcode}/`, {
        //             contact: this.contact,
        //         })
        //             .then(function (response) {
        //                 alert('اطلاعات تماس شما با موفقیت در سامانه ثبت شد.')
        //                 // console.log(response.data);
        //             })
        //             .catch(function (error) {
        //                 // console.log(error);
        //             });
        //     }
        // },
    }

}
</script>
<style scoped>

</style>
