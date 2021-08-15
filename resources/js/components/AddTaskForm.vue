<template>
    <div class="add-task col-12">
        <input class="task-title" type="text" v-model="task.title"/>
        <date-picker v-model="task.due_on" type="datetime"></date-picker>
        <font-awesome-icon class="add-icon" icon="plus-circle" @click="addTask()"/>
    </div>
</template>

<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    components: {DatePicker},
    name: "AddTaskForm",
    data: function () {
        return {
            task: {
                title: "",
                due_on: null
            }
        };
    },
    methods: {
        addTask() {
            if (this.task.title === '' && this.task.due_on == null) {
                return;
            }

            axios.post('api/tasks/store', {
                task: this.task
            })
                .then(response => {
                    if (response.status == 200) {
                        this.task.title = "";
                        this.task.due_on = null;
                        this.$emit('newTaskAdded')
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
};
</script>

<style scoped>
.add-icon {
    margin-left: 5px;
    font-size: 30px;
}

.add-task {
    display: flex;
    justify-content: center;
    align-items: center;
}

.task-title {
    display: inline-block;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    width: 80%;
    height: 34px;
    padding: 6px 30px;
    font-size: 14px;
    line-height: 1.4;
    color: #555;
    outline: none;
    margin-right: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
}
</style>
