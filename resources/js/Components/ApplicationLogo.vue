<script setup>

import {computed} from "vue";

const bgimage = {
    backgroundImage:'url(http://test.test/storage/img/1200px-Tec-Tuxtla_Logo.svg.png)',
    backgroundSize: 'cover'
}

</script>
<template>
    <div class="w-24 h-24 rounded-full mx-auto"
         :style="bgimage">

    </div>
</template>
