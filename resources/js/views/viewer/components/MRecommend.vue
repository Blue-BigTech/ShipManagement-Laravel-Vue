<template>
  <div>
    <div v-for="(item, index) in paidMembersData" :key="index" class="ex-recommend-item">
      <div class="ex-recommend-item-summary">
        <div class="ex-recommend-item-summary-icon">
          <img src="/images/common/icon_certification.svg" alt="遊漁船サーチ認定" />
        </div>
        <dl>
          <dt class="ex-recommend-item-summary-name">{{ item.boat_name }}</dt>
          <dd class="ex-recommend-item-summary-port">{{ item.port_name }}</dd>
          <dd class="ex-recommend-item-summary-review">{{ item.review }}</dd>
        </dl>
      </div>
      <div class="ex-recommend-item-information ex-line">
        <div class="ex-recommend-item-information-image">
          <img :src="item.boat_img_1" alt="貸船" />
        </div>
        <div class="ex-recommend-item-information-items container-fluid">
          <dl class="ex-recommend-item-information-item row">
            <dt class="col-3">業種</dt>
            <dd class="col-9">{{ item.operation_names }}</dd>
          </dl>
          <dl class="ex-recommend-item-information-item row">
            <dt class="col-3">所在地</dt>
            <dd class="col-9">
              〒{{ item.zip_code }}<br />{{ item.prefecture_name }} {{ item.city_name }} <br />{{
                item.address
              }}<br />
            </dd>
          </dl>
          <dl class="ex-recommend-item-information-item row">
            <dt class="col-3">釣り方</dt>
            <dd class="col-9">{{ item.fishing_point }}</dd>
          </dl>
        </div>
      </div>
      <div class="ex-recommend-item-information">
        <dl class="ex-recommend-item-information-pr">
          <dt class="ex-recommend-item-information-pr-headline">船長から一言</dt>
          <dd class="ex-recommend-item-information-pr-comment">{{ item.caption_comment }}</dd>
          <dt class="ex-recommend-item-information-pr-tell">
            「遊漁船サーチをみた」とお伝えください
          </dt>
        </dl>
        <div v-if="!item.phone" class="ex-recommend-item-information-call">
          <a :href="'tel:' + item.phone"
            ><img src="/images/boatList/icon_call.svg" alt="電話をかける"
          /></a>
        </div>
      </div>
      <button class="ex-recommend-item-detail" @click="$emit('onDetail', item.id)">
        詳細を見る
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    paidMembersData: {
      type: Array,
      required: true,
    },
  },
}
</script>
