const n={methods:{viewPost(t){return this.$t.sprintf(this.$t.__("View %1$s",this.$td),t||this.$t.__("Post",this.$td))},editPost(t){return this.$t.sprintf(this.$t.__("Edit %1$s",this.$td),t||this.$t.__("Post",this.$td))},getPostIconClass(t){const s="dashicons-admin-post";return t!=null&&t.startsWith("dashicons-awb-")?s:t||s}}};export{n as P};