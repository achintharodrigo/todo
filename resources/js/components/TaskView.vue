<template>
    <div class="task">
        <input type="checkbox" @change="completeTask()" v-model="task.completed"/>
        <span :class="[task.completed ? 'completed' : '', 'task-title']">
            {{ task.title }}
            <span class="due-time">
                [ {{ task.due_on_for_humans }} ]
            </span>
        </span>
        <font-awesome-icon class="delete-icon" icon="times-circle" @click="removeTask()"/>
    </div>
</template>

<script>
export default {
    name: "TaskView",
    props: ['task'],
    methods: {
        completeTask() {
            axios.put('api/tasks/' + this.task.id, {
                task: this.task
            })
            .then(response => {
                if (response.status == 200) {
                    this.$emit('taskCompleted');
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        removeTask() {
            axios.delete('api/tasks/' + this.task.id )
            .then(response => {
                if (response.status == 200) {
                    this.$emit('taskCompleted');
                }
            })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}

.task-title {
    width: 100%;
    margin-left: 10px;
}

.delete-icon {
    margin-left: 5px;
    font-size: 20px;
    color: red;
}

.task {
    display: flex;
    justify-content: center;
    align-items: center;
    line-height: 1.4;
    color: #555;
    outline: none;
    margin-right: 5px;
    background-color: #eeebeb;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
}

.due-time {
    margin-left: 10px;
    font-style: italic;
}
</style>
