document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', () => ({
        activeSlide: 1,
        slides: [
            { id: 1, img: '/img/2.png', title: 'Universitas Pertamina International Students Sharing Sessions : How To Adapt in New Education Environment', excerpt: 'Ini adalah detail sekilas dari beritanya agar lebih memudahkan pengguna untuk mengetahui konteks berita tanpa membaca keseluruhan berita.' },
            { id: 2, img: '/img/program-img-1.png', title: 'Title News 2', excerpt: 'Excerpt for news 2' },
            { id: 3, img: '/img/about-us-image.png', title: 'Title News 3', excerpt: 'Excerpt for news 3' }
        ],
        init() {
            setInterval(() => {
                this.activeSlide = this.activeSlide < this.slides.length ? this.activeSlide + 1 : 1;
            }, 5000);
        }
    }));
});
