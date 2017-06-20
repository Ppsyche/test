<template>
  <div class="movie">
    <common-header></common-header>
    <movie-nav></movie-nav>
    <common-footer></common-footer>
  </div>
</template>

<script>

  import CommonHeader from '../common/CommonHeader'
  import CommonFooter from '../common/CommonFooter'
  import MovieNav from './MovieNav'

export default {
  data() {
    return {
    }
  },
  components:{
    CommonHeader,
    MovieNav,
    CommonFooter
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  @import "../../assets/css/reset.css";


</style>
