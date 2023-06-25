<template>
    <div>
        <Link href="/" class="link">Task 1</Link>
        <Link href="/task21" class="link">Task 2.1</Link>
        <Link href="/task22" class="link">Task 2.2</Link>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue';

    defineProps({
        active: Boolean
    })
</script>

<style>
   
.link {
  color: rgb(72, 74, 155);
  margin-left: 10px;
  background-color: rgb(106, 248, 213);
}
.link:hover{
    color:brown;
    background-color: rgb(233, 79, 194);
}
.active {
    color :green;
}



</style>