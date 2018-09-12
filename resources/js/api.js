export default {
    getSites() {
        return window.axios.get('/nova-vendor/ohdearapp/oh-dear-tool/sites').then(response => response.data);
    },

    getSite(siteId) {
        return window.axios.get(`/nova-vendor/ohdearapp/oh-dear-tool/sites/${siteId}`).then(response => response.data);
    },

    getUptime(siteId) {
        return window.axios.get(`/nova-vendor/ohdearapp/oh-dear-tool/uptime/${siteId}`).then(response => response.data);
    },

    getMixedContent(siteId) {
        return window.axios
            .get(`/nova-vendor/ohdearapp/oh-dear-tool/mixed-content/${siteId}`)
            .then(response => response.data);
    },

    getBrokenLinks(siteId) {
        return window.axios
            .get(`/nova-vendor/ohdearapp/oh-dear-tool/broken-links/${siteId}`)
            .then(response => response.data);
    }
};
