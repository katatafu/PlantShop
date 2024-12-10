<footer class="footer bg-white flex justify-center items-center py-8 m-4 h-16">
  <div class="text-center">
    <p>&copy; {{ date(format: 'Y') }} My Shop. All rights reserved.</p>
  </div>
</footer>
<style>
  * Nastavení pro HTML a body s minimální výškou 100% */
html, body {
    height: 100%;
    margin: 0;
}

/* Nastavení pro hlavní obsah, který vyplní zbývající místo */
body {
    display: flex;
    flex-direction: column;
    min-height: 100%;
}

/* Flexbox kontejner pro hlavní obsah */
main {
    flex-grow: 1;  /* Zajistí, že hlavní obsah vyplní dostupný prostor */
}

/* Footer bude vždy na spodní části */
.footer {
    background-color: #fff;
    text-align: center;
    padding: 16px;
    width: 100%;
    /* Případně lze nastavit výšku footeru */
    height: 64px;
    box-sizing: border-box;
    margin-top: auto;  /* Umožní footeru být vždy na dně */
}
</style>