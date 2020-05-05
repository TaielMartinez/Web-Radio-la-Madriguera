<div class="navbar navbar_mini_reproductor flex-between color-bg-navbarCelu">
    <div class="progress_back col-12">
        <div class="progress"></div>
    </div>
    <div class="text-center" onclick="player_view_actual()">
        <i class="fas fa-angle-up fa-lg color_letra_blanca"></i>
    </div>
    <span class="flex_truncate_text navbar_texto text-center" onclick="player_view_actual()">
        <span class="color_letra_blanca mb-0 text-center navbar_texto_episodio flex_truncate_text" style="font-size: 20px;">Radio la Madriguera</span>
        <span class="color_letra_blanca"> • </span>
        <span class="color_letra_gris mb-0 text-center navbar_texto_programa flex_truncate_text" style="font-size: 20px;">Vivo</span>
    </span>
    <diva class="text-center play_pause_mini" onclick="play_pause_mini_reproductor()">
        <i class="fas fa-play fa-sm color_letra_blanca"></i>
    </div>
</div>

<script>

 $('.progress_back').hide()

</script>