<template>
    <div>
      <h2>Image Upload</h2>
      <form @submit.prevent="uploadImage">
        <input type="file" @change="onFileChange">
        <button type="submit">Upload</button>
      </form>
      <div v-if="imageUrl">
        <h3>Uploaded Image:</h3>
        <img :src="imageUrl" width="300px">
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        image: null,
        imageUrl: ''
      };
    },
    methods: {
      onFileChange(e) {
        this.image = e.target.files[0];
      },
      async uploadImage() {
        if (!this.image) return;
  
        let formData = new FormData();
        formData.append('image', this.image);
  
        try {
          const response = await axios.post('http://localhost:8000/upload', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          });
  
          this.imageUrl = `http://localhost:8000/images/${response.data.image}`;
        } catch (error) {
          console.error('Error uploading image:', error);
        }
      }
    }
  };
  </script>
  