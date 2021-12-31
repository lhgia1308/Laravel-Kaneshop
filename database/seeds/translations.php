
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class translations extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("translations")->insert([
                        ['id'=>1,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'af','key'=>'name','value'=>'Home decorators collection boswell quarter 14 in.','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>2,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'af','key'=>'description','value'=>'<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only</p>

<h1>Technical Details</h1>

<table>
	<tbody>
		<tr>
			<th>Brand</th>
			<td>HD</td>
		</tr>
		<tr>
			<th>Manufacturer</th>
			<td>HD</td>
		</tr>
		<tr>
			<th>Item Weight</th>
			<td>1 pounds</td>
		</tr>
		<tr>
			<th>Package Dimensions</th>
			<td>17 x 16.8 x 12.8 inches</td>
		</tr>
		<tr>
			<th>Is Discontinued By Manufacturer</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Style</th>
			<td>Rustic</td>
		</tr>
		<tr>
			<th>Material</th>
			<td>Wood, Nickel</td>
		</tr>
		<tr>
			<th>Finish Types</th>
			<td>Brushed</td>
		</tr>
		<tr>
			<th>Number of Lights</th>
			<td>3</td>
		</tr>
		<tr>
			<th>Voltage</th>
			<td>10 Volts</td>
		</tr>
		<tr>
			<th>Shade Color</th>
			<td>Gray</td>
		</tr>
		<tr>
			<th>Batteries Included?</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Batteries Required?</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Wattage</th>
			<td>100 watts</td>
		</tr>
	</tbody>
</table>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>3,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'vi','key'=>'name','value'=>'Đèn trần trang trí nhà','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>4,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'vi','key'=>'description','value'=>'<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only</p>

<h1>Technical Details</h1>

<table>
	<tbody>
		<tr>
			<th>Brand</th>
			<td>HD</td>
		</tr>
		<tr>
			<th>Manufacturer</th>
			<td>HD</td>
		</tr>
		<tr>
			<th>Item Weight</th>
			<td>1 pounds</td>
		</tr>
		<tr>
			<th>Package Dimensions</th>
			<td>17 x 16.8 x 12.8 inches</td>
		</tr>
		<tr>
			<th>Is Discontinued By Manufacturer</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Style</th>
			<td>Rustic</td>
		</tr>
		<tr>
			<th>Material</th>
			<td>Wood, Nickel</td>
		</tr>
		<tr>
			<th>Finish Types</th>
			<td>Brushed</td>
		</tr>
		<tr>
			<th>Number of Lights</th>
			<td>3</td>
		</tr>
		<tr>
			<th>Voltage</th>
			<td>10 Volts</td>
		</tr>
		<tr>
			<th>Shade Color</th>
			<td>Gray</td>
		</tr>
		<tr>
			<th>Batteries Included?</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Batteries Required?</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Wattage</th>
			<td>100 watts</td>
		</tr>
	</tbody>
</table>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>5,'translationable_type'=>'App\Model\Category','translationable_id'=>'11','locale'=>'vi','key'=>'name','value'=>'Thời trang nữ','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>6,'translationable_type'=>'App\Model\Category','translationable_id'=>'10','locale'=>'vi','key'=>'name','value'=>'Thời trang nam','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>7,'translationable_type'=>'App\Model\Category','translationable_id'=>'9','locale'=>'vi','key'=>'name','value'=>'Điện thoại','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>8,'translationable_type'=>'App\Model\Category','translationable_id'=>'8','locale'=>'vi','key'=>'name','value'=>'Máy tính','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>9,'translationable_type'=>'App\Model\Product','translationable_id'=>'83','locale'=>'vn','key'=>'name','value'=>'Áo dài tay dài nhẹ bằng lông cừu Pháp có khóa kéo','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>10,'translationable_type'=>'App\Model\Product','translationable_id'=>'83','locale'=>'vn','key'=>'description','value'=>'<p>60% cotton, 40% polyester</p>

<ul>
	<li>Đ&atilde; nhập</li>
	<li>Đ&oacute;ng kh&oacute;a k&eacute;o</li>
	<li>M&aacute;y giặt</li>
	<li>Chiếc &aacute;o d&agrave;i c&oacute; kh&oacute;a k&eacute;o 1/4 n&agrave;y bằng l&ocirc;ng cừu Ph&aacute;p cực kỳ mềm mại v&agrave; thoải m&aacute;i l&agrave; lựa chọn ph&ugrave; hợp để c&oacute; một vẻ ngo&agrave;i dễ d&agrave;ng, giản dị</li>
	<li>C&oacute; tay &aacute;o d&agrave;i, t&uacute;i kangaroo ph&iacute;a trước c&oacute; v&aacute;, cổ &aacute;o cao v&agrave; đường viền ở cổ, cổ tay &aacute;o v&agrave; viền &aacute;o</li>
	<li>Mỗi ng&agrave;y một tốt hơn: ch&uacute;ng t&ocirc;i lắng nghe phản hồi của kh&aacute;ch h&agrave;ng v&agrave; tinh chỉnh từng chi tiết để đảm bảo chất lượng, sự vừa vặn v&agrave; thoải m&aacute;i</li>
</ul>

<h2>Chi tiết sản phẩm</h2>

<ul>
	<li>K&iacute;ch thước g&oacute;i h&agrave;ng: &amp; nbsp; 12,44 x 11,89 x 1,89 inch; 10,58 Ounce</li>
	<li>Số kiểu mặt h&agrave;ng: &amp; nbsp; AE18111988</li>
	<li>Bộ phận: &amp; nbsp; Phụ nữ</li>
	<li>Ng&agrave;y c&oacute; sẵn lần đầu ti&ecirc;n: &amp; nbsp; ng&agrave;y 6 th&aacute;ng 2 năm 2020</li>
	<li>Nh&agrave; sản xuất: &amp; nbsp; Amazon Essentials</li>
	<li>ASIN: &amp; nbsp; B07W6NPBVV</li>
</ul>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>11,'translationable_type'=>'App\Model\Product','translationable_id'=>'83','locale'=>'zh','key'=>'name','value'=>'Women\'s long-sleeve lightweight french terry fleece quarter-zip top','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>12,'translationable_type'=>'App\Model\Product','translationable_id'=>'83','locale'=>'zh','key'=>'description','value'=>'<p>60% Cotton, 40% Polyester</p>

<ul>
	<li>Imported</li>
	<li>Zipper closure</li>
	<li>Machine Wash</li>
	<li>This quarter-zip up top in incredibly soft and comfortable French terry fleece is a go-to for an easy, casual look</li>
	<li>Features long-sleeves, patch front kangaroo pocket, high collar, and ribbing at the neck, cuffs and hem</li>
	<li>Everyday made better: we listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort</li>
</ul>

<h2>Product details</h2>

<ul>
	<li>Package Dimensions :&nbsp;12.44 x 11.89 x 1.89 inches; 10.58 Ounces</li>
	<li>Item model number :&nbsp;AE18111988</li>
	<li>Department :&nbsp;Womens</li>
	<li>Date First Available :&nbsp;February 6, 2020</li>
	<li>Manufacturer :&nbsp;Amazon Essentials</li>
	<li>ASIN :&nbsp;B07W6NPBVV</li>
</ul>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>13,'translationable_type'=>'App\Model\Product','translationable_id'=>'83','locale'=>'af','key'=>'name','value'=>'Women\'s long-sleeve lightweight french terry fleece quarter-zip top','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>14,'translationable_type'=>'App\Model\Product','translationable_id'=>'83','locale'=>'af','key'=>'description','value'=>'<p>60% Cotton, 40% Polyester</p>

<ul>
	<li>Imported</li>
	<li>Zipper closure</li>
	<li>Machine Wash</li>
	<li>This quarter-zip up top in incredibly soft and comfortable French terry fleece is a go-to for an easy, casual look</li>
	<li>Features long-sleeves, patch front kangaroo pocket, high collar, and ribbing at the neck, cuffs and hem</li>
	<li>Everyday made better: we listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort</li>
</ul>

<h2>Product details</h2>

<ul>
	<li>Package Dimensions :&nbsp;12.44 x 11.89 x 1.89 inches; 10.58 Ounces</li>
	<li>Item model number :&nbsp;AE18111988</li>
	<li>Department :&nbsp;Womens</li>
	<li>Date First Available :&nbsp;February 6, 2020</li>
	<li>Manufacturer :&nbsp;Amazon Essentials</li>
	<li>ASIN :&nbsp;B07W6NPBVV</li>
</ul>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>15,'translationable_type'=>'App\Model\Category','translationable_id'=>'1','locale'=>'vn','key'=>'name','value'=>'Làm đẹp, sức khỏe','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>16,'translationable_type'=>'App\Model\Category','translationable_id'=>'1','locale'=>'zh','key'=>'name','value'=>'美容、健康与头发','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>17,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'vn','key'=>'name','value'=>'Bộ sưu tập đồ trang trí nhà boswell quý 14 in','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>18,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'vn','key'=>'description','value'=>'<p> Một mặt dây chuyền 3 ánh sáng vui nhộn và tươi mới lấy cảm hứng từ các điểm nhấn của hàng hải. Khung mở phổ biến trong nhiều kiểu thiết kế nhà ngày nay và được hoàn thiện bằng Brushed Nickel. Mặt dây chuyền có thể được sử dụng thay cho đèn chùm cho các phương án thiết kế sáng tạo, được trưng bày riêng lẻ hoặc được ghép nối theo nhóm trên đảo bếp, bàn ăn và trong hành lang. Lớp hoàn thiện bằng niken được đánh bóng Không có bóng 14 inch. Đường kính x 20 inch. H Sử dụng (3) Bóng đèn cơ sở trung bình 100 Watt (không bao gồm) 60 inch của dây chuyền bao gồm Sơn điểm nhấn bằng gỗ màu xám đã phong hóa Chỉ thích hợp cho những nơi khô ráo </p>

<h1> Chi tiết kỹ thuật </h1>

<bàn>
<người>
<tr>
<th> Thương hiệu </th>
<td> HD </td>
</tr>
<tr>
<th> Nhà sản xuất </th>
<td> HD </td>
</tr>
<tr>
<th> Trọng lượng sản phẩm </th>
<td> 1 pound </td>
</tr>
<tr>
<th> Kích thước gói hàng </th>
<td> 17 x 16,8 x 12,8 inch </td>
</tr>
<tr>
<th> Bị nhà sản xuất ngừng sản xuất </th>
<td> Không </td>
</tr>
<tr>
<th> Kiểu </th>
<td> Mộc mạc </td>
</tr>
<tr>
<th> Chất liệu </th>
<td> Gỗ, Niken </td>
</tr>
<tr>
<th> Các loại kết thúc </th>
<td> Được chải </td>
</tr>
<tr>
<th> Số lượng đèn </th>
<td> 3 </td>
</tr>
<tr>
<th> Điện áp </th>
<td> 10 Volt </td>
</tr>
<tr>
<th> Màu bóng </th>
<td> Xám </td>
</tr>
<tr>
<th> Pin được bao gồm? </th>
<td> Không </td>
</tr>
<tr>
<th> Yêu cầu pin? </th>
<td> Không </td>
</tr>
<tr>
<th> Công suất </th>
<td> 100 watt </td>
</tr>
</tbody>
</table>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>19,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'zh','key'=>'name','value'=>'Home decorators collection boswell quarter 14 in.','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>20,'translationable_type'=>'App\Model\Product','translationable_id'=>'96','locale'=>'zh','key'=>'description','value'=>'<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only</p>

<h1>Technical Details</h1>

<table>
	<tbody>
		<tr>
			<th>Brand</th>
			<td>HD</td>
		</tr>
		<tr>
			<th>Manufacturer</th>
			<td>HD</td>
		</tr>
		<tr>
			<th>Item Weight</th>
			<td>1 pounds</td>
		</tr>
		<tr>
			<th>Package Dimensions</th>
			<td>17 x 16.8 x 12.8 inches</td>
		</tr>
		<tr>
			<th>Is Discontinued By Manufacturer</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Style</th>
			<td>Rustic</td>
		</tr>
		<tr>
			<th>Material</th>
			<td>Wood, Nickel</td>
		</tr>
		<tr>
			<th>Finish Types</th>
			<td>Brushed</td>
		</tr>
		<tr>
			<th>Number of Lights</th>
			<td>3</td>
		</tr>
		<tr>
			<th>Voltage</th>
			<td>10 Volts</td>
		</tr>
		<tr>
			<th>Shade Color</th>
			<td>Gray</td>
		</tr>
		<tr>
			<th>Batteries Included?</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Batteries Required?</th>
			<td>No</td>
		</tr>
		<tr>
			<th>Wattage</th>
			<td>100 watts</td>
		</tr>
	</tbody>
</table>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>21,'translationable_type'=>'App\Model\Product','translationable_id'=>'93','locale'=>'vn','key'=>'name','value'=>'Sữa tắm Dove có vòi bơm với các chất nuôi dưỡng da tự nhiên','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>22,'translationable_type'=>'App\Model\Product','translationable_id'=>'93','locale'=>'vn','key'=>'description','value'=>'<table>
<tbody>
<tr>
<td> Thành phần </td>
<td> Nước (Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene / Acrylates Copolymer, Stearic Acid, DMDM ​​Hydantoin, BHT, Sodium Isethionate , PEG-150 Pentaerythrityl Tetrastearate, PPG-2 Hydroxyethyl Cocamide, Tetrasodium EDTA, Etidronic Acid, Methylisothiazolinone, Iodopropynyl Butylcarbamate, Propylene Glycol, Citric Acid, Red 33 (CI 17200) Nước (Aqua), Cocamidopropyl Betaine, Natri Clorua , Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene / Acrylates Copolymer, Stearic Acid, D & hellip; & nbsp; <a href="javascript:void(0)"> Xem thêm </a> < / td>
</tr>
<tr>
<td> Mùi hương </td>
<td> Độ ẩm sâu </td>
</tr>
<tr>
<td> Thương hiệu </td>
<td> Chim bồ câu </td>
</tr>
<tr>
<td> Loại da </td>
<td> Nhạy cảm </td>
</tr>
<tr>
<td> Mẫu mặt hàng </td>
<td> Rửa </td>
</tr>
</tbody>
</table>

<p> Dove Deep Moisture Body Wash cũng rất hiệu quả để làm sạch đôi tay! </p>

<ul>
<li> MILD VÀ CÂN BẰNG PH: Sữa tắm Dove bao gồm Moisture Renew Blend & mdash; sự kết hợp của các chất nuôi dưỡng da tự nhiên và chất dưỡng ẩm có nguồn gốc thực vật giúp hấp thụ sâu vào các lớp trên cùng của da </li>
<li> SỮA RỬA MẶT CƠ THỂ ĐƯỢC KHUYẾN NGHỊ: Nuôi dưỡng làn da với công thức dạng kem đậm đặc, giúp da bạn mềm mại hơn sữa tắm. </li>
<li> ĐƯỢC SẢN XUẤT HOÀN TOÀN: Sữa tắm này được PETA chứng nhận không chứa chất độc hại và được làm bằng 100% chai nhựa tái chế, vì vậy bạn có thể cảm thấy hài lòng khi chuyển từ xà phòng tắm hàng ngày sang sữa tắm Dove. </li>
<li> DƯỠNG ẨM TỪ THỰC VẬT: Chất tẩy rửa có nguồn gốc tự nhiên và các chất dinh dưỡng tự nhiên cho da, sữa tắm dạng kem từ Dove nhẹ nhàng với hệ vi sinh vật, vì vậy bạn sẽ được nuôi dưỡng đẹp trong khi duy trì làn da khỏe mạnh </li>
<li> CHĂM SÓC NHƯ BẠN VỆ SINH: Hiệu quả làm sạch và sự chăm sóc bạn cần, tất cả trong một sản phẩm. </li>
</ul>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>23,'translationable_type'=>'App\Model\Product','translationable_id'=>'93','locale'=>'zh','key'=>'name','value'=>'Dove body wash with pump with skin natural nourishers','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>24,'translationable_type'=>'App\Model\Product','translationable_id'=>'93','locale'=>'zh','key'=>'description','value'=>'<table>
	<tbody>
		<tr>
			<td>Ingredients</td>
			<td>Water(Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene/Acrylates Copolymer, Stearic Acid, DMDM Hydantoin, BHT, Sodium Isethionate, PEG-150 Pentaerythrityl Tetrastearate, PPG-2 Hydroxyethyl Cocamide, Tetrasodium EDTA, Etidronic Acid, Methylisothiazolinone, Iodopropynyl Butylcarbamate, Propylene Glycol, Citric Acid, Red 33 (CI 17200)Water(Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene/Acrylates Copolymer, Stearic Acid, D&hellip;&nbsp;<a href="javascript:void(0)">See more</a></td>
		</tr>
		<tr>
			<td>Scent</td>
			<td>Deep Moisture</td>
		</tr>
		<tr>
			<td>Brand</td>
			<td>Dove</td>
		</tr>
		<tr>
			<td>Skin Type</td>
			<td>Sensitive</td>
		</tr>
		<tr>
			<td>Item Form</td>
			<td>Wash</td>
		</tr>
	</tbody>
</table>

<p>Dove Deep Moisture Body Wash is Just As Effective for Cleaning Hands!</p>

<ul>
	<li>MILD AND PH-BALANCED: Dove body wash includes Moisture Renew Blend&mdash;a combination of skin-natural nourishers and plant-based moisturizers that absorb deeply into the top layers of skin</li>
	<li>DERMATOLOGIST RECOMMENDED BODY WASH: Nourishes skin with a rich, creamy formula, leaving your skin softer than a shower gel can.</li>
	<li>THOUGHTFULLY MADE: This body wash is PETA-certified cruelty free and made in 100% recycled plastic bottles, so you can feel good about switching from everyday shower soap to Dove body wash.</li>
	<li>PLANT-BASED MOISTURIZER: Naturally-derived cleansers and skin-natural nutrients, creamy body wash from Dove is microbiome gentle, so you&rsquo;ll get beautifully nourished while maintaining healthy skin</li>
	<li>CARE AS YOU CLEAN: The cleansing efficacy and care you need, all in one product.</li>
</ul>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>25,'translationable_type'=>'App\Model\Product','translationable_id'=>'93','locale'=>'af','key'=>'name','value'=>'Dove body wash with pump with skin natural nourishers','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>26,'translationable_type'=>'App\Model\Product','translationable_id'=>'93','locale'=>'af','key'=>'description','value'=>'<table>
	<tbody>
		<tr>
			<td>Ingredients</td>
			<td>Water(Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene/Acrylates Copolymer, Stearic Acid, DMDM Hydantoin, BHT, Sodium Isethionate, PEG-150 Pentaerythrityl Tetrastearate, PPG-2 Hydroxyethyl Cocamide, Tetrasodium EDTA, Etidronic Acid, Methylisothiazolinone, Iodopropynyl Butylcarbamate, Propylene Glycol, Citric Acid, Red 33 (CI 17200)Water(Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene/Acrylates Copolymer, Stearic Acid, D&hellip;&nbsp;<a href="javascript:void(0)">See more</a></td>
		</tr>
		<tr>
			<td>Scent</td>
			<td>Deep Moisture</td>
		</tr>
		<tr>
			<td>Brand</td>
			<td>Dove</td>
		</tr>
		<tr>
			<td>Skin Type</td>
			<td>Sensitive</td>
		</tr>
		<tr>
			<td>Item Form</td>
			<td>Wash</td>
		</tr>
	</tbody>
</table>

<p>Dove Deep Moisture Body Wash is Just As Effective for Cleaning Hands!</p>

<ul>
	<li>MILD AND PH-BALANCED: Dove body wash includes Moisture Renew Blend&mdash;a combination of skin-natural nourishers and plant-based moisturizers that absorb deeply into the top layers of skin</li>
	<li>DERMATOLOGIST RECOMMENDED BODY WASH: Nourishes skin with a rich, creamy formula, leaving your skin softer than a shower gel can.</li>
	<li>THOUGHTFULLY MADE: This body wash is PETA-certified cruelty free and made in 100% recycled plastic bottles, so you can feel good about switching from everyday shower soap to Dove body wash.</li>
	<li>PLANT-BASED MOISTURIZER: Naturally-derived cleansers and skin-natural nutrients, creamy body wash from Dove is microbiome gentle, so you&rsquo;ll get beautifully nourished while maintaining healthy skin</li>
	<li>CARE AS YOU CLEAN: The cleansing efficacy and care you need, all in one product.</li>
</ul>','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))]
                    ]);
                
                        }
                    }
                