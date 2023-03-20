# php-number-to-text
PHP ile sayısal para değerinin okunuşunu yazdırma fonksiyonu

## Kullanımı
Girdi:
`moneyToText('123456.23');` <br><br>
Çıktı: `YüzYirmiÜçBinDörtYüzElliAltıTürkLirasıYirmiÜçKuruş`

### Not
Bu fonksiyon 999,999,999,999.99 sayısına kadar çalışmaktadır. Yani Trilyon cinsinden bir parayı çeviremez, gerekli bir kaç değişiklikle trilyon ve çok daha fazlasını değiştirmemizi sağlayacak hale getirilebilir.

