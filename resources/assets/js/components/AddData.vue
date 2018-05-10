<template>
    <div>
        <h3>Додати нову інформацію</h3>
        <div class="right">
            <router-link class="btn btn-xs btn-primary" to="/">
                <span class="glyphicon glyphicon-arrow-left"></span>
                Home
            </router-link>
        </div>
        <notification v-bind:notifications="notifications"></notification>
        <form class="form" v-on:submit.prevant="createData" >
            <div v-bind:class="{'text-danger': hasError}">
                <label for="surname">Фамілія</label>
                <input v-model="worker.surname" id="surname" class="form-control" >
                <span v-for="error in errors" class="alert alert-danger">{{ error}}</span>
            </div>
            <div >
                <label for="name">Імя</label>
                <input v-model="worker.name" id="name" class="form-control" >
            </div>
            <div class="form-group">
                <label for="patronymic">По-батькові</label>
                <input v-model="worker.patronymic" id="patronymic" class="form-control" >
            </div>
            <div class="form-group">
                <label for="born">Рік народження</label>
                <input v-model="worker.born" id="born" class="form-control">
            </div>
            <div class="form-group">
                <label for="position">Посада</label>
                <input v-model="worker.position" id="position" class="form-control" >
            </div>
            <div class="form-group">
                <label for="salary">Зарплата(грн/рік)</label>
                <input v-model="worker.salary" id="salary" class="form-control" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>

    </div>
</template>

<script>

    export default{
        data:function () {
            return {
                worker:{surname:'',name:'', patronymic:'', born:'', position:'',salary:''},
                fetchError:null

            }
        },
        methods:{
            createData:function () {
                    let uri = 'http://excelimport//allData';
                    Axios.post(uri,this.worker).then((response)=>{
                       this.push({url:'/' })
                    });

            }
        }


    }
</script>