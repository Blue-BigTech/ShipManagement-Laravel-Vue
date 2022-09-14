<template>
  <nav class="ex-menu">
    <ul class="ex-menu-items">
      <li class="ex-menu-item ex-edit">
        <!-- <a href="#" class="ex-edit"><span>基本情報編集</span></a> -->
        <router-link class="ex-menu-item__link ex-edit" :to="ROUTE.LENDER.BASIC_INFO"
          ><span>基本情報編集</span></router-link
        >
      </li>
      <li class="ex-menu-item ex-edit">
        <!-- <a href="#" class="ex-edit"><span>プラン登録</span></a> -->
        <router-link class="ex-menu-item__link ex-edit" :to="ROUTE.LENDER.BASIC_INFO"
          ><span>プラン登録</span></router-link
        >
      </li>
      <li class="ex-menu-item ex-edit">
        <!-- <a href="#" class="ex-edit"><span>釣果投稿</span></a> -->
        <router-link
          class="ex-menu-item__link ex-edit"
          :to="{ name: `${ROUTE.LENDER.POST.DETAIL.name}`, params: { id: 'new' } }"
          ><span>釣果投稿</span></router-link
        >
      </li>
      <li class="ex-menu-item ex-edit">
        <!-- <a href="#" class="ex-edit"><span>投稿編集</span></a> -->
        <router-link class="ex-menu-item__link ex-edit" :to="ROUTE.LENDER.POST.LIST"
          ><span>投稿編集</span></router-link
        >
      </li>
      <li class="ex-menu-item ex-ranking">
        <!-- <a href="#" class="ex-ranking"><span>電話数ランキング</span></a> -->
        <router-link class="ex-menu-item__link ex-ranking" :to="ROUTE.LENDER.BASIC_INFO"
          ><span>電話数ランキング</span></router-link
        >
      </li>
      <li class="ex-menu-item ex-line">
        <!-- <a href="#" class="ex-line"><span>LINE広告依頼</span></a> -->
        <router-link class="ex-menu-item__link ex-line" :to="ROUTE.LENDER.BASIC_INFO"
          ><span>LINE広告依頼</span></router-link
        >
      </li>
      <li class="ex-menu-item ex-contact">
        <!-- <a href="#" class="ex-contact"><span>お問合せ</span></a> -->
        <router-link class="ex-menu-item__link ex-contact" :to="ROUTE.LENDER.BASIC_INFO"
          ><span>お問合せ</span></router-link
        >
      </li>
    </ul>
  </nav>
</template>

<script>
import ROUTE from '@/consts/route'

export default {
  data: () => ({
    ROUTE,
  }),
}
</script>
