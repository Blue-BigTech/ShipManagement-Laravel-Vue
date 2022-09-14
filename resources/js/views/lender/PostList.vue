<template>
  <div id="Wrapper" class="lender post">
    <div class="lender-inner">
      <MHeader :title="'投稿一覧'" />
      <main class="main">
        <AButton
          label="新規登録"
          class="shadow"
          width="128px"
          :color="BUTTON.COLOR.MAIN_DARK"
          @onClick="onNew"
        />
        <div v-for="(post, pi) in postList" :key="pi">
          <div class="main__index pointer m-4" @click="onDetail(post.id)">
            {{ post.title }}
          </div>
        </div>
      </main>
      <MFooter />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

import AButton from '@/views/components/AButton.vue'
import MHeader from '@/views/lender/components/MHeader.vue'
import MFooter from '@/views/lender/components/MFooter.vue'

// const
import HTTP_STATUS from '@/consts/httpStatus'
import ROUTE from '@/consts/route'
import BUTTON from '@/consts/button'

// repository
import { RepositoryFactory } from '@/repositories/repositoryFactory'

const lenderPostRepository = RepositoryFactory.get('lenderPosts')

export default {
  components: {
    AButton,
    MHeader,
    MFooter,
  },

  data: () => ({
    BUTTON,
    postList: [],
  }),

  computed: {
    ...mapState('userModule', ['lenderUser']),
  },

  async created() {
    this.showLoader()
    await this.fetchLenderPostIndex()
    this.hideLoader()
  },

  methods: {
    async fetchLenderPostIndex() {
      await lenderPostRepository
        .index(this.lenderUser.lender_id)
        .then(res => {
          if (res.status !== HTTP_STATUS.OK) {
            this.$toast.errorToast()
            return
          }
          this.postList = res.data
        })
        .catch(async err => {
          if (err.response) {
            await this.$errHandling.lenderCatch(err.response.status)
            return
          }
          this.$toast.errorToast()
        })
    },

    onDetail(id) {
      this.$router.push({
        name: ROUTE.LENDER.POST.DETAIL.name,
        params: { id },
      })
    },

    onNew() {
      this.$router.push({
        name: ROUTE.LENDER.POST.DETAIL.name,
        params: { id: 'new' },
      })
    },
  },
}
</script>
<style lang="scss" scoped>
.main {
  &__index {
    border-bottom: solid 1px lightgray;
  }
}
</style>
