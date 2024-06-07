<template>
    <div>
        <p v-if="hasGeolocation">Latitude: {{ latitude }}, Longitude: {{ longitude }}</p>
        <p v-else>Geolocation not supported or permission denied.</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            latitude: null,
            longitude: null,
            hasGeolocation: false
        };
    },
    mounted() {
        if (this.$geolocation.supported) {
            this.$geolocation.getCurrentPosition()
                .then(position => {
                    this.latitude = position.coords.latitude;
                    this.longitude = position.coords.longitude;
                    this.hasGeolocation = true;
                })
                .catch(error => {
                    console.error('Error getting geolocation:', error);
                    this.hasGeolocation = false;
                });
        } else {
            console.error('Geolocation not supported.');
        }
    }
};
</script>
