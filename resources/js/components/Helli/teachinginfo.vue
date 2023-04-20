<template>
    <div>
        <form class="mt-8" @submit.prevent="handleSubmit">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span>
                <h2 class="text-base font-bold  ">اطلاعات ‌تدریس</h2>
                <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="w-full lg:w-4/12 px-4 flex-row">
                <div class="relative w-full mb-3">
                    <label class="block uppercase  text-base font-bold mb-2">استاد می
                        باشید؟</label>
                    <select :disabled="disableSelection" v-model="item.isMaster" v-for="(item, index) in teaching" @change="divStatus"
                            class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                        <option selected value="خیر" v-bind:selected="item.term=='خیر'">خیر</option>
                        <option value="بله" v-bind:selected="item.term=='بله'">بله</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap mt-5" v-for="(item, index) in teaching"
                 v-show="item.isMaster === 'بله' ||showDiv">

                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">کد
                            استادی<span
                                style="color: red;">*</span></label>
                        <input type="text" v-for="(item, index) in teaching" :key="index"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.masterCode">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">استان و شهر محل
                            تدریس<span
                                style="color: red;">*</span></label>
                        <select v-for="(item, index) in teaching" :key="index" v-model="item.teachingLocation"
                            class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option disabled selected>انتخاب کنید</option>
                            <option v-for="province in provinces" :value="province.title">{{ province.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">نام محل
                            تدریس<span
                                style="color: red;">*</span></label>
                        <input type="text" v-for="(item, index) in teaching" :key="index"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.teachingPlaceName">
                    </div>
                </div>
            </div>
            <div class="w-full mt-4">
                <button v-show="showButton" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">ذخیره اطلاعات تدریس</button>
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
            showDiv: false,
            showButton: false,
            disableSelection:false,
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
        axios.get('/api/defaults/provinces')
            .then(response => {
                this.fetchUserData();
                this.provinces = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        divStatus(event) {
            if (event.target.value === 'بله') {
                this.showDiv = true;
            } else {
                this.showDiv = false;
            }
        },

        fetchUserData() {
            axios.get(`/api/teaching/${this.nationalcode}/`)
                .then(response => {
                    this.teaching = response.data;
                    const userData = response.data;

                    if (userData[0]['masterCode']==null){
                        this.showButton = true;
                    }else if (userData[0]['masterCode']!=null){
                        this.disableSelection=true;
                    }
                });

        },

        handleSubmit() {
            console.log(this.teaching);
            let isMaster = this.teaching[0]['isMaster'];
            let masterCode = this.teaching[0]['masterCode'];
            let teachingLocation = this.teaching[0]['teachingLocation'];
            let teachingPlaceName = this.teaching[0]['teachingPlaceName'];
            if (isMaster == '' || isMaster == null) {
                alert('استاد می باشید؟');
            } else if (isMaster == 'بله' && ((masterCode == null || masterCode == '') || (teachingLocation == null || teachingLocation == '') || (teachingPlaceName == null || teachingPlaceName == ''))) {
                if (masterCode == null || masterCode == '') {
                    alert('کد استادی وارد نشده است.');
                    return false;
                } else if (teachingLocation == null || teachingLocation == '' || teachingLocation=='انتخاب کنید') {
                    alert('استان و شهر محل تدریس انتخاب نشده است.');
                    return false;
                } else if (teachingPlaceName == null || teachingPlaceName == '') {
                    alert('نام محل تدریس وارد نشده است.');
                    return false;
                }

            } else {
                axios.post(`/api/teaching/save/${this.nationalcode}/`, {
                    teaching: this.teaching,
                })
                    .then(function (response) {
                        alert('اطلاعات تماس شما با موفقیت در سامانه ثبت شد.')
                        // console.log(response.data);
                    })
                    .catch(function (error) {
                        // console.log(error);
                    });
            }
        },
    }

}
</script>
<style scoped>

</style>
