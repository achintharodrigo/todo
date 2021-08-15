<template>
    <div>
        <add-task-form v-on:newTaskAdded="getTaskList()"/>
        <task-summary :tasks="tasks" v-on:reloadSummery="getTaskList()"/>
    </div>
</template>

<script>
import AddTaskForm from "./AddTaskForm";
import TaskSummary from "./TaskSummary";

export default {
    name: "TodoApp",
    components: {TaskSummary, AddTaskForm},
    data: () => {
        return {
            tasks: []
        }
    },
    methods: {
        getTaskList() {
            axios.get('api/tasks')
                .then(response => {
                    this.tasks = response.data.data
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    created() {
        this.getTaskList();
    }
}
</script>

<style scoped>

</style>
