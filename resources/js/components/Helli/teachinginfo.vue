<template>
    <div>
        <form class="mt-8" @submit.prevent="handleSubmit(this.token)" id="teaching">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span>
                <h2 class="text-base font-bold  ">اطلاعات ‌تدریس</h2>
                <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="w-full lg:w-4/12 px-4 flex-row mt-3">
                <div class="relative w-full mb-3">
                    <label class="block uppercase  text-base font-bold mb-2">استاد می
                        باشید؟</label>
                    <select :disabled="disableSelection" v-model="item.isMaster" v-for="(item, index) in teaching"
                            @change="divStatus"
                            class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                        <option selected value="خیر" v-bind:selected="item.term==='خیر'">خیر</option>
                        <option value="بله" v-bind:selected="item.term==='بله'">بله</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap mt-5" v-for="(item, index) in teaching"
                 v-show="item.isMaster === 'بله' ||showDiv"
            >

                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">کد
                            استادی<span
                                style="color: red;">*</span></label>
                        <input :disabled="disableSelection" type="text" v-for="(item, index) in teaching" :key="index"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.masterCode">
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">استان محل تدریس<span
                            style="color: red;">*</span></label>
                        <select :disabled="disableSelection" v-model="item.teachingProvince"
                                v-for="(item, index) in teaching" id="teaching_state"
                                @change="returnCity(item.teachingProvince)"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in ostan" :value="item.ostan"
                                    v-bind:selected="item.teachingProvince===item.ostan">{{ item.ostan }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">شهر محل
                            تدریس<span style="color: red;">*</span></label>
                        <select :disabled="disableSelection" v-model="item.teachingCity"
                                v-for="(item, index) in teaching" id="teaching_city"
                                @change="returnSchool(item.teachingCity)"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in shahr" :value="item.shahr"
                                    v-bind:selected="item.teachingCity===item.shahr">{{ item.shahr }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">نام مدرسه محل
                            تدریس<span
                                style="color: red;">*</span></label>
                        <select :disabled="disableSelection" v-model="item.teachingPlaceName"
                                v-for="(item, index) in teaching" id="teaching_school"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in madrese" :value="item.madrese"
                                    v-bind:selected="item.teachingPlaceName===item.madrese">{{ item.madrese }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-full mt-4">
                <button v-show="showButton" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">
                    ذخیره اطلاعات تدریس
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "teachinginfo",
    props: ['token'],
    data() {
        return {
            requestsCount: 0,
            teaching: [],
            provinces: [],
            showDiv: false,
            showButton: true,
            disableSelection: false,
            ostan: [],
            shahr: [],
            madrese: [],
            teachingProvince: [],
            teachingCity: [],
            teachingPlaceName: [],
            nationalcode:'',

        }
    },
    async mounted() {
        await this.getDataFromTeachingTable(this.token);
        await this.getDataFromProvincesTable(this.nationalcode);

    },
    methods: {
        getDataFromProvincesTable() {
            axios.get(`/defaults/provinces_without_gender`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.ostan = response.data;
                })
                .catch(error => {
                    // console.log(error)
                })
        },
        getDataFromTeachingTable(token) {
            axios.get('/teaching/' + token,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.teaching = response.data;
                    const userData = response.data;
                    if (userData[0]['approved'] === 1) {
                        this.showButton = false;
                        this.disableSelection = true;
                        this.returnCity2(this.teaching[0]['teachingProvince']);
                        this.returnSchool2(this.teaching[0]['teachingCity']);
                    } else {
                        this.disableSelection = false;
                        this.showButton = true;
                        if (this.teaching[0]['isMaster']){
                            this.returnCity2(this.teaching[0]['teachingProvince']);
                            this.returnSchool2(this.teaching[0]['teachingCity']);
                        }
                    }
                })
                .catch(error => {
                    // console.log(error)
                })
        },
        returnCity(province) {
            this.shahr = [];
            this.madrese = [];
            this.provinceSend = province;
            axios.get(`/defaults/cities_without_gender/${province}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.teaching[0]['teachingCity']='';
                    this.shahr = response.data;
                })
                .catch(error => {
                    // console.log(error)
                })
        },
        returnSchool(city) {
            axios.get(`/defaults/schools_without_gender/${city}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.teaching[0]['teachingPlaceName']='';
                    this.madrese = response.data;
                })
                .catch(error => {
                    // console.log(error)
                })
        },
        returnCity2(province) {
            this.shahr = [];
            this.madrese = [];
            this.provinceSend = province;
            axios.get(`/defaults/cities_without_gender/${province}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.shahr = response.data;
                })
                .catch(error => {
                    // console.log(error)
                })
        },
        returnSchool2(city) {
            axios.get(`/defaults/schools_without_gender/${city}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.madrese = response.data;
                })
                .catch(error => {
                    // console.log(error)
                })
        },
        divStatus(event) {
            if (event.target.value === 'بله') {
                this.showDiv = true;
            } else {
                this.showDiv = false;
            }
        },
        handleSubmit(token) {
            let isMaster = this.teaching[0]['isMaster'];
            let masterCode = this.teaching[0]['masterCode'];
            let teachingProvince = this.teaching[0]['teachingProvince'];
            let teachingCity = this.teaching[0]['teachingCity'];
            let teachingPlaceName = this.teaching[0]['teachingPlaceName'];
            if (isMaster === '' || isMaster === null) {
                alert('استاد می باشید؟');
            } else if (isMaster === 'بله' && ((masterCode === null || masterCode === '') || (teachingProvince === null || teachingProvince === '') || (teachingCity === null || teachingCity === '') || (teachingPlaceName === null || teachingPlaceName === ''))) {
                if (masterCode === null || masterCode === '') {
                    alert('کد استادی وارد نشده است.');
                    return false;
                } else if (teachingProvince === null || teachingProvince === '' || teachingProvince === 'انتخاب کنید') {
                    alert('استان محل تدریس انتخاب نشده است.');
                    return false;
                } else if (teachingCity === null || teachingCity === '' || teachingCity === 'انتخاب کنید') {
                    alert('شهر محل تدریس انتخاب نشده است.');
                    return false;
                } else if (teachingPlaceName === null || teachingPlaceName === '' || teachingPlaceName === 'انتخاب کنید') {
                    alert('نام محل تدریس انتخاب نشده است.');
                    return false;
                }

            } else {
                if (confirm('آیا از صحت اطلاعات وارد شده مطمئن هستید؟ ' +
                    '\n' +
                    'پس از تایید دیگر قابل ویرایش نیست.')) {
                    axios.post(`/teaching/save/${token}`, {
                        teaching: this.teaching,
                    })
                        .then(response => {
                            this.getDataFromTeachingTable(token);
                            alert('اطلاعات تدریس شما با موفقیت در سامانه ثبت شد.');
                            location.reload();
                            // var element = document.getElementById("posts");
                            // element.scrollIntoView();
                        })
                        .catch(error => {
                            // console.log(error);
                        });
                }

            }
        },
    }

}
</script>
<style scoped>

</style>
