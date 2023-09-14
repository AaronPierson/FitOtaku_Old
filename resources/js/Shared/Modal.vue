<template>
    <dialog ref="dialog" :open="isModalOpenProp">
      <article ref="article">
        <header>
          <slot name="header">
            <h1>Modal</h1>

          </slot>
        </header>
        <section>
          <slot name="body">
            <div v-html="modalBody"></div>            
          </slot>
        </section>

        <footer>
          <button @click="closeModal" class="contrast">Close</button>
        </footer>
      </article>
    </dialog>

</template>

<script>
export default {
  props: ['isModalOpenProp'],
  methods: {
    closeModal() {
      this.$emit("close");
    },
    saveModal() {
      console.log("saveModal");
      // this.$emit("save");
      // this.closeModal();

    },
  },
  mounted() {
    document.addEventListener("keydown", event => {
      if (event.key === "Escape") {
        this.closeModal();
      }
    });

    this.$refs.dialog.addEventListener("click", event => {
      if (!this.$refs.article.contains(event.target)) {
        this.closeModal();
      }
    });
  },
};
</script>

<style scoped>
article {
  width: 80%;
}

header{
  /* background-color: #f1f1f1; */
  text-align: center;
  
}

footer{
  width: initial !important;
}
</style>