<template>
    <div>
        <Links />
        <h1>Task 2.1</h1>
        <form @submit.prevent="prozessText">
            <div>
                <textarea v-model="text" />
            </div>

            <button type="submit">Prozess Text</button>
        </form>
        
        <div v-if="showResult211">
            <label class="red">Output for task 2.1.1</label><br>
            {{ result211 }}
        </div>
        <div v-if="showResult212">
            <label class="red">Output for task 2.1.2</label><br>
            {{ result212 }}
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import Links from './Links.vue';

    let text = ref('Lorem Ipsum is simply [tag1 description="Some value"]dummy text[/tag1] of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the [tag2]1500s[/tag2], when an unknown printer took...')
    let showResult211 = ref(false);
    let result211 = ref('');
    let showResult212 = ref(false);
    let result212 = ref('');
    
    let prozessText = () => { 
        fetch('/prozessTask21', {
            method : 'POST',  
            credentials: 'same-origin', 
            body : JSON.stringify({
                text: text.value,
            })
        })
        .then(response => response.json())
        .then(recievedResult => {

             result211.value = recievedResult.response.content; 
             showResult211.value = true;

             result212.value = recievedResult.response.descriptionAttr; 
             showResult212.value = true;
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