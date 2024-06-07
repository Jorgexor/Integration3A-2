<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

import ImageUpload from '@/Components/ImageUpload.vue';



const TypeOfAccident = ref('')
const form = useForm({
    TypeOfAccident: '',
    Description: '',
    Date:'',
    filename:'',
    location:'',
    image:'',
});
const submit = () => {
    form.post(route('reports.store'));
};
</script>
<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create report
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('dashboard')"
                            >
                                Back
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                            <div className="flex flex-col">
                                <div className="mb-4">

                                    <InputLabel for="TypeOfAccident" value="Type Of Accident" />
                                    <div>{{ TypeOfAccident }}</div>
                                    <select v-model="form.TypeOfAccident">
                                        <option disabled value="">Please select one</option>
                                        <option>Natural Disaster</option>
                                        <option>Traffic Incident</option>
                                        <option>Human Behaviour</option>
                                        <TextInput
                                            id="TypeOfAccident"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.TypeOfAccident"
                                            autofocus />
                                    </select>
                                    <span className="text-red-600" v-if="form.errors.TypeOfAccident">
                                            {{ form.errors.TypeOfAccident }}
                                        </span>
                                </div>
                                <div className="mb-4">
                                    <InputLabel for="Description" value="Description" />

                                    <TextInput
                                        id="Description"
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
                                        id="Date"
                                        type="datetime-local"
                                        v-model="form.Date"
                                        autofocus />
                                    <span className="text-red-600" v-if="form.errors.Date">
                                            {{ form.errors.Date }}
                                        </span>
                                </div>

                                <div className="mb-4">
                                    <InputLabel for="filename" value="filename" />
                                    <TextInput
                                        id="filename"
                                        input type = "file"
                                        class="mt-1 block w-full"
                                        v-model="form.filename"
                                        autofocus />
                                    <span className="text-red-600" v-if="form.errors.filename">
                                            {{ form.errors.filename }}
                                        </span>
                                </div>

                                <div className="mb-4">
                                    <InputLabel for="location" value="location" />
                                    <TextInput
                                        id="filename"
                                        class="mt-1 block w-full"
                                        v-model="form.location"
                                        autofocus />
                                    <span className="text-red-600" v-if="form.errors.location">
                                            {{ form.errors.location }}
                                        </span>
                                </div>
                            </div>
                            
                            <div className="mt-4">
                                <button
                                    type="submit"
                                    className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                >
                                    Save
                                </button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

