<h1>Настройки слайдера</h1>
<div>
    <h2>{message}</h2>
</div>
<hr>
<table class="admin-table">
    <tr>
        <td valign="top" style="padding-right: 20px">
            <form action="/wp-admin/admin.php?page=reviews" method="post" name="text">
                <p><b>Выберите изображение:</b><br>
                <p><img class="custom_media_image" src="" alt="" style="width: 80px;"></p>
                <p><button class="custom_media_upload">Загрузить</button></p>
                <p><input id="image" class="custom_media_url" type="text" name="attachment_url" value=""></p>
                <p><b>Введите имя:</b> <input type="text" name="name" value=""></p>
                 <p><b>Введите профессию:</b> <input type="text" name="prof" value=""></p>
                <p><b>Введите отзыв:</b><textarea rows="10" cols="45" name="review" value=""></textarea ></p>
                <p><input type='submit' value='Отправить'/></p>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table style="width: 100%">
                <caption>Существующие отзывы</caption>
                <tr>
                    <td style="padding-right: 10px">
                        <p>Фото:</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Имя:</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Отзыв:</p>
                    </td>
                    <td>
                        <p>Удалить</p>
                    </td>
                </tr>
                {texts}
            </table>
        </td>
    </tr>
</table>
<br/>