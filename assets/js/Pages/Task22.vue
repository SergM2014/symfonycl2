<template>
    <div>
        <Links />
        <h1>Task 2.2</h1>
        <form @submit.prevent="prozessText">
            <div>
                <textarea v-model="text" />
            </div>

            <button type="submit">Prozess Text</button>
        </form>
        
        <div v-if="showResult22">
            <label class="red">Output for task 2.2</label><br>
            {{ result22 }}
        </div>
        
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import Links from './Links.vue';

    let text = ref('Lorem Ipsum is simply one: dummy text of the printing and two: typesetting industry. Lorem Ipsum has been the industry\'s one: standard dummy text ever since the three: 1500s.')
    let showResult22 = ref(false);
    let result22 = ref('');
   
    
    let prozessText = () => { 
        fetch('/prozessTask22', {
            method : 'POST', 
            credentials: 'same-origin',  
            body : JSON.stringify({
                text: text.value,
            })
        })
        .then(response => response.json())
        .then(recievedResult => {

             result22.value = recievedResult.response; 
             showResult22.value = true;

            })
    }
</script>

<style>
    textarea {
        min-width: 500px;
        min-height:300px;
    }
    .red {
        color: red;
    }
</style>