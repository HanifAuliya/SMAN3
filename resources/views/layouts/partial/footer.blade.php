<footer class="footer bg-white text-dark pt-5 fade-in-up">
    <div class="container">
        {{-- Section 1: Logo dan Alamat --}}
        <div class="row mb-4 border-bottom pb-4 fade-in-up">
            <div class="col-md-12 text-center">
                <img src="assets/img/logo.png" alt="Logo SMAN 3 Barabai" class="footer-logo mb-3"
                    style="max-width: 120px" />
                <p class="fw-bold">SMAN 3 Barabai</p>
                <p class="text-muted">
                    JL. Griya Hasan Baseri. 4, Birayang Kec. Batang Alai Selatan, Kab.
                    Hulu Sungai Tengah, Kalimantan Selatan.
                </p>
            </div>
        </div>

        {{-- Section 3: Media Sosial --}}
        <div class="row mb-4 border-bottom pb-4">
            <div class="col-md-12 text-center">
                <h5 class="fw-bold">Ikuti Kami</h5>
                <ul class="list-unstyled d-flex justify-content-center gap-4">
                    <li>
                        <a href="#" class="footer-link">
                            <i class="bi bi-globe"></i>
                            Website
                        </a>
                    </li>
                    <li>
                        <a href="mailto:sman3barabai@gmail.com" class="footer-link">
                            <i class="bi bi-envelope"></i>
                            Email
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/smagabarabai" class="footer-link">
                            <i class="bi bi-instagram"></i>
                            Instagram
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@smagabrb" class="footer-link">
                            <i class="bi bi-tiktok"></i>
                            TikTok
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Section 4: Copyright --}}
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <p class="small text-muted mb-0">
                    &copy; 2025 SMAN 3 Barabai. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fadeInElements = document.querySelectorAll(".fade-in-up");

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            }
        );

        fadeInElements.forEach((el) => observer.observe(el));
    });
</script>
