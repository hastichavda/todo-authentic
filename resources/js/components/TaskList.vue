<template>
 <div class='row'>
   <div class="card">
     <div class="card-header">
       <div class="card-title">
           <h1>My Tasks</h1>
       </div>
     </div>
     <div class="card-body">
         <form action="#" @submit.prevent="createTask()">
           <div class="input-group">
               <input v-model="task.body" type="text" name="body" class="form-control mr-2" autofocus>
               <span class="input-group-btn">
                   <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i></button>
               </span>
           </div>
       </form>
     </div>
     <div class="card-footer">
               <h4>All Tasks</h4>
       <ul class="list-group">
           <li class="list-group-item" v-if='list.length === 0'>There are no tasks yet!</li>
           <li class="list-group-item table-striped" v-for="(task, index) in list" :key="index">
              {{ task.body }}
              <button @click="deleteTask(task.id,index)" class="btn btn-danger btn-xs del"><i class="fa fa-trash"></i></button>
           </li>
       </ul>

     </div>
   </div>
 </div>
</template>
<script>
export default {
  props:[
    'user',
    'tasks'
  ],
  data() {
    return {
        list: [],
        task: {
            id: '',
            body: ''
        }
    };
  },
  mounted() {
    if(this.tasks) {
        this.list = this.tasks
    }
  },
  methods: {
    createTask() {
      let data = {
        body: this.task.body,
        user_id: this.user.id
      }
      console.log(data);
      axios.post('/tasks', data)
        .then((res) => {
            this.task.body = '';
            this.edit = false;
            this.list.push(res.data.task)
        })
      .catch((err) => console.error(err));
    },
  deleteTask(id,index) {
    axios.delete('/tasks' + id)
      .then((res) => {
      this.list.splice(index,1)
      })
      .catch((err) => console.error(err));
    },
  }
}
</script>
<style >
.card {
  width: 100%;
  background: rgb(179, 225, 236);
}
.delete {
  margin-left:auto;
}
.del {
  margin: 0px 10% 0px 90%;
}
</style>