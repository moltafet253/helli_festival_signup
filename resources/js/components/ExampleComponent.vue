<template>
    <div>
        <h3>Component Export</h3>
        <p>Name: {{ dataFromController.name }}</p>
        <p>Age: {{ dataFromController.age }}</p>
        <textarea name="" id="" cols="30" rows="10">{{ dataFromController.name }}</textarea>
    </div>
</template>

<script>
axios.post('/my-route', {
    name: 'John Doe',
    email: 'john@example.com'
}).then(response => {
    console.log(response.data);
});
export default {
    props: ['dataFromController'],
    mounted() {
        console.log('Component mounted Test')
    },
}
</script>
