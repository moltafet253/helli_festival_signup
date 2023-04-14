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
                    <select
                        class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                        <option selected value="خیر">خیر</option>
                        <option value="بله">بله</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap mt-5">

                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">کد
                            استادی</label>
                        <input type="text"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               value="45123">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">استان و شهر محل
                            تدریس</label>
                        <input type="text"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               value="قم - جعفریه">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نام محل
                            تدریس</label>
                        <input type="text"
                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               value="موسسه آموزش تشیع">
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
    name: "teachinginfo"
}
</script>

<style scoped>

</style>
