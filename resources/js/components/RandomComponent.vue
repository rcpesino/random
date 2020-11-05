<template>
    <div class="container">
            <div v-for ="item in randomList" :key="item.id">

                <div>
                    {{ item.values}}<br>
                   
                </div>

        

                     <span  v-for="index  in 5" :key="index ">
                               {{ item.random[index].values }}
                    </span>

        

            </div>

    </div>
    
</template>

<script>
    export default {
        props:['random'],
    data(){
        return{
        randomList:this.random
            }
        }
    }
</script>
