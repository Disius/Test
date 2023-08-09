<script setup>

import {computed} from "vue";

const bgimage = {
    backgroundImage:'url(http://test.test/storage/img/ITTG_Escudo)',
    backgroundSize: 'cover'
}

</script>
<template>
    <div class="rounded-full mx-auto"
         :style="bgimage">

    </div>
</template>
