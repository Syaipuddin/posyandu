<div id="blog-wrapper" style="padding: 20px 0;">
    <div class="blog-holder" style="max-width: 100%; margin: 0 auto;">
        <article id="post-1" class="blog-item-holder featured-post" style="margin: 0 15px;">
            <div class="entry-content" style="position: relative;">
                <div class="content-1170 center-relative" id="show-jadwal" 
                     style="max-width: 100%; padding: 0 15px;">
                    <!-- Content will automatically adjust to mobile -->
                </div>
            </div>
        </article>
    </div>
    <div class="clear"></div>
</div>

<style>
    /* Responsive Media Queries */
    @media (max-width: 768px) {
        #blog-wrapper {
            padding: 10px 0;
        }
        
        .blog-holder {
            padding: 0 10px;
        }
        
        .featured-post {
            margin: 0 !important;
        }
        
        #show-jadwal {
            padding: 0 10px !important;
        }
    }

    @media (max-width: 480px) {
        .content-1170 {
            max-width: 100% !important;
        }
        
        .entry-content {
            padding: 10px 0;
        }
    }
</style>

<div class="clear"></div>

<script>
    var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/jadwal.js') ?>"></script>