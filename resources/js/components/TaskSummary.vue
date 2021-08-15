<template>
    <div>
        <div v-for="(task, index) in tasks" :key="index">
            <task-view :task="task" class="task" v-on:taskCompleted="$emit('reloadSummery')"/>
        </div>
    </div>
</template>

<script>
import taskView from "./TaskView"

export default {
    name: "TaskSummary",
    props: ['tasks'],
    components: {
        taskView
    }
}
</script>

<style scoped>
.task {
    padding: 5px;
    margin-top: 5px;

}
</style>
