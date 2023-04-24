<template>
    <div>
        <form class="mt-8" @submit.prevent="handleSubmit">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span>
                <h2 class="text-base font-bold">اطلاعات ‌تماس</h2>
                <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="mt-3 flex ">
                <span><img class="flex items-center bg-orange-400 rounded-md w-5 ml-2"
                           src="build/assets/icons/Danger Triangle.svg"
                           alt=""></span>
                <p>در صورت نیاز به تغییر اطلاعات تماس فیلدهای زیر را تکمیل نمائید. (توجه داشته باشید که اطلاعات وارد شده
                    توسط شما در سامانه پیشخوان ثبت نخواهد شد.)</p>
            </div>
            <div class="flex flex-wrap mt-5">
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">تلفن ثابت (به
                            همراه کد شهر)</label>
                        <input :disabled="!showButton" v-for="(item, index) in contact" :key="index" type="number"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.phone">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">تلفن
                            همراه<span style="color: red;">*</span></label>
                        <input :disabled="!showButton" v-for="(item, index) in contact" :key="index" type="number"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.mobile">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">کدپستی (بدون خط فاصله یا هر علامت
                            دیگر)</label>
                        <input :disabled="!showButton" v-for="(item, index) in contact" :key="index" type="number"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.postal_code">
                    </div>
                </div>
                <div class="w-full px-4 flex-row">
                    <label class="block uppercase  text-base font-bold mb-2">آدرس</label>
                    <textarea :disabled="!showButton"
                        class="border border-colorborder p-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                        rows="5" v-for="(item, index) in contact" :key="index" v-model="item.address"></textarea>
                </div>
                <div class="w-full mt-4">
                    <button v-if="showButton"
                            class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">ذخیره اطلاعات
                        تماس
                    </button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "contactinfo",
    props: ['nationalcode'],
    data() {
        return {
            contact: [],
            address: '',
            phone: '',
            mobile: '',
            postal_code: '',
            showButton: true,
        }
    },
    mounted() {
        axios.get(`/api/contact/${this.nationalcode}/`)
            .then(response => {
                this.contact = response.data;
                if (this.contact[0]['approved'] === 1) {
                    this.showButton = false;
                }
            })
            .catch(error => {
                console.log(error)
            });

    },
    methods: {
        handleSubmit() {
            let mobile = this.contact[0]['mobile'];
            let postal_code = this.contact[0]['postal_code'];
            let phone = this.contact[0]['phone'];
            let address = this.contact[0]['address'];
            if (mobile === '' || mobile == null) {
                alert('شماره همراه وارد نشده است.');
            } else if (phone === '' || phone === null) {
                alert('تلفن ثابت وارد نشده است.');
                return false;
            } else if (postal_code === '' || postal_code === null) {
                alert('کدپستی وارد نشده است.');
                return false;
            } else if (address === '' || address === null) {
                alert('آدرس وارد نشده است.');
                return false;
            } else {
                axios.post(`/api/contact/save/${this.nationalcode}/`, {
                    contact: this.contact,
                })
                    .then(function (response) {
                        alert('اطلاعات تماس شما با موفقیت در سامانه ثبت شد.');
                        location.reload();
                        // console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
    }

}
</script>

<style scoped>

</style>
