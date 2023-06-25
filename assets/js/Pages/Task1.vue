<template>
    <div>
        <Links />
        <h1>Task 1</h1>
        <form @submit.prevent="calculatePrice">
            <div class="input">
                <label>Put weight : </label>
                <input v-model="weight" /> in KG
            </div>
            <div class="input">
                <label> Select a Carrier</label>
                <select v-model="selectedCarrier">
                    <option disabled value=""></option>
                    <option v-for="carrier in carriers" :value="carrier.id">{{ carrier.title }}</option>
                </select>
            </div>
            <br>
            <button type="submit">Calculate Price</button>
        </form>
        <br>
        <br>
        <div>
            <label> The price will be: </label><br>
            <input v-model="result" /> EUR
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import Links from './Links.vue';

    let weight = ref('');
    let selectedCarrier = ref('');
    let result = ref('');

    let calculatePrice = () => { 
        fetch('/calculate', {
            method : 'POST', 
            credentials: 'same-origin',  
            body : JSON.stringify({
                weight: weight.value,
                carrier: selectedCarrier.value
            })
        })
        .then(response => response.json())
        .then(recievedResult => { result.value = recievedResult.response })
    }

    defineProps({
        carriers: Object
    })
</script>

<style>
    .input {
        margin-top: 10px;
    }
</style>