<template>
    <div>
        <h3>Список даних загружених із файлу</h3>
        <div class="right">
            <router-link class="btn btn-xs btn-primary" to="/add-data">
                <span class="glyphicon glyphicon-plus"></span>
                        Add
            </router-link>
        </div>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Surname</th>
                    <th>Name</th>
                    <th>Patronymic</th>
                    <th>Born</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="value in filterData">
                    <td>{{ value.id }}</td>
                    <td>{{value.surname }}</td>
                    <td>{{value.name }}</td>
                    <td>{{value.patronymic }}</td>
                    <td>{{value.born }}</td>
                    <td>{{value.position }}</td>
                    <td>{{value.salary }}</td>
                    <td>
                        <router-link class="btn btn-xs btn-warning" to="/edit-data">Edit</router-link>
                        <router-link class="btn btn-xs btn-danger" to="/delete-data">Delete</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
        data:function () {
          return  {allData:''}
        },
        created:function () {
            let uri = 'http://excelimport/allData';
            Axios.get(uri).then((response)=>{
               this.allData = response.data;
            });
        },
        computed:{
            filterData:function () {
                if(this.allData.length){
                    return this.allData;
                }
            }
        }
    }
</script>

<style>
    .right{
        float: right;
        margin-right:40px
    }
</style>