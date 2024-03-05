<template>
    <div dir="ltr">
        <nav class="bg-navbar-base mb2 text-white px-10 border-b-8 border-c-orange">
            <div class="container flex items-center justify-between px-4 py-2">
                <div class="mb-2">
                    <a target="_blank" href="pub_files/help.pdf" class="mr-4 text-white">راهنمای کار با سامانه</a>
                    &nbsp;
                    <a target="_blank" href="pub_files/conditions.pdf" class="mr-4 text-white">شرایط شرکت در
                        جشنواره</a>
                </div>
                <div class="flex space-x-4">
                    <a href="https://pazhuhesh.ismc.ir" target="_blank">
                        <img src="build/assets/icons/Helli Logo.png" alt="لوگو علامه حلی" class="h-14">
                    </a>
                    <a href="https://pazhuhesh.ismc.ir" target="_blank">
                        <img src="build/assets/icons/Logo.svg" alt="لوگو پژوهش" class="h-14">
                    </a>

                </div>
            </div>
        </nav>
    </div>

    <!-- show modal for alert user (first time) -->
    <transition enter-active-class="3 transition ease-out duration-100" enter-class="opacity-0"
                v-if="this.showConfirmationModal"
                enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                leave-class="opacity-100" leave-to-class="opacity-0">
        <div class="fixed z-40 inset-0 overflow-y-auto">
            <div
                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                      aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-6 pt-4">
                        <!--                                                <img class="mx-auto mt-8" src="build/assets/icons/success.png"-->
                        <!--                                                     alt="Image">-->
                    </div>
                    <div class="px-6 pb-4 text-center ">
                        <p class="mb-2 font-bold mx-auto">
                            شرکت‌کننده گرامی
                            <br/>
                            با سلام
                        </p>
                        <p class="mb-2 font-bold mx-auto">
                            در صورتی که برای نخستین بار در این سامانه ثبت‌نام می‌نمایید، همه اطلاعات درخواستی را با دقت
                            تکمیل نموده و پس از بارگزاری فایل اثر (تا سه اثر امکان شرکت دارید)، در آخرین مرحله حتما
                            گزینه ثبت نهایی را بزنید.

                            و در صورتی که قبلا در این سامانه ثبت‌نام نموده‌اید، اطلاعات تماس و اطلاعات تحصیلی شما نمایش
                            داده می‌شود. حتما موارد را با دقت بررسی و در صورت نیاز به تغییر، آن را اصلاح نموده و سپس
                            نسبت به ثبت اثر جدید اقدام فرمایید.
                        </p>
                        <p class="mb-2 font-bold mx-auto">
                            <br/>
                            با تشکر
                            <br/>
                            دبیرخانه جشنواره
                        </p>
                        <div class="flex justify-center pb-8">
                            <button @click="confirmForDataEntry"
                                    class="bg-white hover:bg-slate-200 border border-colorborder text-black py-2 px-10 rounded-xl">
                                بستن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "appheader",
    props: ['token'],
    data() {
        return {
            showConfirmationModal: false
        }
    },
    mounted() {
        this.checkDataEntry(this.token);
    },
    methods: {
        checkDataEntry(token){
            // axios.get(`/getConfirmationToDataEntry/${token}`)
            //     .then(response => {
            //             if (response.data) {
            //                 this.showConfirmationModal = false;
            //             }
            //         }
            //     )
            //     .catch(error => {
            //         console.log(error)
            //     });
        },
        confirmForDataEntry() {

        }
    }
}
</script>
