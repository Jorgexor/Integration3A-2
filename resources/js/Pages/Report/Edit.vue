<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
const props = defineProps({
    report: Object,
});
const form = useForm({
    TypeOfAccident: props.report.TypeOfAccident,
    Description: props.report.Description,
    Date: props.report.Date,
    filename: props.report.filename,
    location: props.report.location
});
const submit = () => {
    form.put(route('reports.update', props.report.id));
};
</script>
<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Report
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('reports.index')"
                            >
                                Back
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                            <div className="flex flex-col">
                                <div className="mb-4">
                                    <InputLabel for="TypeOfAccident" value="TypeOfAccident" />

                                    <TextInput
                                        id="title"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.TypeOfAccident"
                                        autofocus />
                                    <span className="text-red-600" v-if="form.errors.TypeOfAccident">
                                            {{ form.errors.TypeOfAccident }}
                                        </span>
                                </div>
                                <div className="mb-4">
                                    <InputLabel for="Description" value="Description" />

                                    <TextInput
                                        id="body"
                                        class="mt-1 block w-full"
                                        v-model="form.Description"
                                        autofocus />
                                    <span className="text-red-600" v-if="form.errors.Description">
                                            {{ form.errors.Description }}
                                        </span>
                                </div>
                            

                            <div className="mb-4">
                                <InputLabel for="Date" value="Date" />

                                <TextInput
                                    id="body"
                                    class="mt-1 block w-full"
                                    type="datetime-local"
                                    v-model="form.Date"
                                    autofocus />
                                <span className="text-red-600" v-if="form.errors.Date">
                                            {{ form.errors.Date }}
                                        </span>
                            </div>

                            
                            
                            <div className="mt-4">
                                <button
                                    type="submit"
                                    className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                >
                                    Save
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
