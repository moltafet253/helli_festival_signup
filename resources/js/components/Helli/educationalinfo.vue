<template>
    <div>
        <form class="mt-8">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span> <h2 class="text-base font-bold  ">اطلاعات ‌تحصیلی</h2>
                <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="flex flex-wrap mt-5">
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نام مرکز حوزوی</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option v-for="(item, index) in edu" :key="index" v-bind:selected="item.namemarkaztahsili=='حوزه‌های علمیه برادران'">حوزه‌های علمیه برادران</option>
                            <option v-for="(item, index) in edu" :key="index" v-bind:selected="item.namemarkaztahsili=='حوزه‌های علمیه حواهران'">حوزه‌های علمیه خواهران</option>
                            <option v-for="(item, index) in edu" :key="index" v-bind:selected="item.namemarkaztahsili=='حوزه علمیه خراسان'">حوزه علمیه خراسان</option>
                            <option v-for="(item, index) in edu" :key="index" v-bind:selected="item.namemarkaztahsili=='حوزه علمیه اصفهان'">حوزه علمیه اصفهان</option>
                            <option v-for="(item, index) in edu" :key="index" v-bind:selected="item.namemarkaztahsili=='جامعةالمصطفی'">جامعةالمصطفی</option>
                            <option v-for="(item, index) in edu" :key="index" v-bind:selected="item.namemarkaztahsili=='جامعةالزهرا'">جامعةالزهرا</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نوع تحصیل حوزوی</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option value="آزاد" v-for="(item, index) in edu" :key="index" v-bind:selected="item.noetahsilhozavi=='آزاد'">آزاد</option>
                            <option value="تحت برنامه" v-for="(item, index) in edu" :key="index" v-bind:selected="item.noetahsilhozavi=='تحت برنامه'">تحت برنامه</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row" v-if="nationalcode['gender']=='مرد'">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">پایه</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option value="1" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='1'">1</option>
                            <option value="2" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='2'">2</option>
                            <option value="3" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='3'">3</option>
                            <option value="4" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='4'">4</option>
                            <option value="5" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='5'">5</option>
                            <option value="6" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='6'">6</option>
                            <option value="7" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='7'">7</option>
                            <option value="8" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='8'">8</option>
                            <option value="9" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='9'">9</option>
                            <option value="10" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='10'">10</option>
                            <option value="11" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='11'">11</option>
                            <option value="12" v-for="(item, index) in edu" :key="index" v-bind:selected="item.paye=='12'">12</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">استان محل تحصیل</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="قم">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">شهر محل تحصیل</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="قم">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">مدرسه</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="امام صادق(ع)">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">شماره پرونده حوزوی</label>
                        <input v-for="(item, index) in edu" :key="index" type="text"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.shparvandetahsili">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">مدرک تحصیلی غیر حوزوی</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option value="دیپلم" v-for="(item, index) in edu" :key="index" v-bind:selected="item.tahsilatghhozavi=='دیپلم'">دیپلم</option>
                            <option value="فوق دیپلم/کاردانی" v-for="(item, index) in edu" :key="index" v-bind:selected="item.tahsilatghhozavi=='فوق دیپلم/کاردانی'">فوق دیپلم/کاردانی</option>
                            <option value="لیسانس/کارشناسی" v-for="(item, index) in edu" :key="index" v-bind:selected="item.tahsilatghhozavi=='لیسانس/کارشناسی'">لیسانس/کارشناسی</option>
                            <option value="فوق لیسانس/کارشناسی ارشد" v-for="(item, index) in edu" :key="index" v-bind:selected="item.tahsilatghhozavi=='فوق لیسانس/کارشناسی ارشد'">فوق لیسانس/کارشناسی ارشد</option>
                            <option value="دکتری" v-for="(item, index) in edu" :key="index" v-bind:selected="item.tahsilatghhozavi=='دکتری'">دکتری</option>
                            <option value="فوق دکتری" v-for="(item, index) in edu" :key="index" v-bind:selected="item.tahsilatghhozavi=='فوق دکتری'">فوق دکتری</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">رشته تحصیلی غیر حوزوی</label>
                        <input v-for="(item, index) in edu" :key="index" type="text"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.reshtedaneshgahi">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">مرکز تخصصی حوزوی</label>
                        <input v-for="(item, index) in edu" :key="index" type="text"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.markaztakhasosihozavi">
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
    name: "educationalinfo",
    props:['nationalcode'],

    data() {
        return {
            edu: [],
            gender :'',
        }
    },
    mounted() {
        axios.get(`/api/edu/${this.nationalcode.nationalcode}/`)
            .then(response => {
                this.edu = response.data.edu;
                this.gender = response.data.gender;
            })
            .catch(error => {
                console.log(error)
            })
    },
    methods: {
        handleSubmit() {
            let mobile=this.contact[0]['mobile'];
            if (mobile=='' || mobile==null){
                alert ('شماره همراه وارد نشده است.');
            }
            else if (mobile.length<11 || mobile.length>11){
                alert('شماره همراه در فرمت اشتباه وارد شده است.');
                return false;
            }
            else{
                axios.post(`/api/contact/save/${this.nationalcode}/`, {
                    contact: this.contact,
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
