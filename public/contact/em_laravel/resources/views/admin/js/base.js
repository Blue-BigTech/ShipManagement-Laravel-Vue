var msie = navigator.appVersion.toLowerCase();
msie = (msie.indexOf('msie') > -1) ? parseInt(msie.replace(/.*msie[ ]/, '').match(/^[0-9]+/)) : 0;

/*
if (typeof document.body.style.maxWidth!='undefined') {
	IE6までは実行させない処理
}
*/


/****************************************************************
 * 全角/半角文字判定
 *
 * 引数 ： str チェックする文字列
 * flg 0:半角文字、1:全角文字
 * 戻り値： true:含まれている、false:含まれていない
 *
 ****************************************************************/
function isZenHan(str, flg) {
  for (var i = 0; i < str.length; i++) {
    var c = str.charCodeAt(i);
    // Shift_JIS: 0x0 ～ 0x80, 0xa0 , 0xa1 ～ 0xdf , 0xfd ～ 0xff
    // Unicode : 0x0 ～ 0x80, 0xf8f0, 0xff61 ～ 0xff9f, 0xf8f1 ～ 0xf8f3
    if ((c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) {
      if (!flg) return true;
    } else {
      if (flg) return true;
    }
  }
  return false;
}


/**
 * 半角かなが混じってるとFalseを返す
 **/
function isHanChar(val) {
  var hc = "｡｢｣､･ｦｧｨｩｪｫｬｭｮｯｰｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝﾞﾟ";
  val = String(val);
  for (var i = 0; i < val.length; i++) {
    if (hc.indexOf(val.charAt(i), 0) >= 0)
      return false;
  }
  return true;
}


/****************************************************************
 * 機　能： 入力された値が日付でYYYY/MM/DD形式又はYYYY.MM.DDになっているか調べる
 * 引　数： datestr　入力された値
 * 戻り値： 正：true　不正：false
 ****************************************************************/
function checkDate(datestr) {
  // 正規表現による書式チェック
  if (!datestr.match(/^\d{4}\/\d{2}\/\d{2}$/) && !datestr.match(/^\d{4}\.\d{2}\.\d{2}$/)) {
    return false;
  }
  var vYear = datestr.substr(0, 4) - 0;
  var vMonth = datestr.substr(5, 2) - 1; // Javascriptは、0-11で表現
  var vDay = datestr.substr(8, 2) - 0;
  // 月,日の妥当性チェック
  if (vMonth >= 0 && vMonth <= 11 && vDay >= 1 && vDay <= 31) {
    var vDt = new Date(vYear, vMonth, vDay);
    if (isNaN(vDt)) {
      return false;
    } else if (vDt.getFullYear() == vYear && vDt.getMonth() == vMonth && vDt.getDate() == vDay) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

/**
 * カウントした文字数を返す
 * 全角1つ→1文字
 * 半角2つ→1文字
 * @param strSrc
 * @returns {Number}
 */
function strLength(strSrc) {
  len = 0;
  strSrc = escape(strSrc);
  for (var i = 0; i < strSrc.length; i++, len++) {
    if (strSrc.charAt(i) == "%") {
      if (strSrc.charAt(++i) == "u") {
        i += 3;
        len++;
      }
      i++;
    }
  }
  return len;
}

/**
 * チェック対象文字列が入力されているかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 文字列が入力されている場合はtrue、
 * 文字列が入力されていない場合はfasle
 */
function isNotEmpty(argValue) {
  if (argValue == "" || argValue == null) {
    return false;
  }
  return true;
}

/**
 * チェック対象文字列が入力されていないかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 文字列が入力されていない場合はtrue、
 * 文字列が入力されているの場合はfasle
 */
function isEmpty(argValue) {
  if (argValue == "" || argValue == null) {
    return true;
  }
  return false;
}

/**
 * チェック対象文字列が半角数字のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角数字の場合はtrue、
 * 半角数字以外の文字が含まれている場合はfalse
 */
function isNumeric(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[^0-9|]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/**
 * チェック対象文字列が半角数字（小数点、符号を含む）のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 有効文字列（"0123456789"および".-+"）のみで構成されている場合はtrue、
 * 有効文字列以外の文字が含まれている場合はfalse
 */
function isNumericDecimal(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[^0-9|^.+-]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/**
 * チェック対象文字列が半角英数字のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角英数字の場合はtrue、
 * 半角英数字以外の文字が含まれている場合はfalse
 */
function isAlphabetNumeric(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[^A-Z|^a-z|^0-9]/g)) {
    return false;
  }
  else {
    return true;
  }
}


/**
 * すべて半角英数ハイフンの場合TRUEを返す
 */
function isAlNumHyphen(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[0-9a-zA-Z\-]/g)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * すべて半角数字ハイフンの場合TRUEを返す
 */
function isNumHyphen(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[0-9\-]/g)) {
    return true;
  }
  else {
    return false;
  }
};


/**
 * 全て半角英数、ハイフン、アンダースコアの場合Trueを返す
 */
function isAlNumHyphenUnderS(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[^0-9|^a-z|^A-Z|^\-_]/g)) {
    return false;
  }
  else {
    return true;
  }
};


/**
 * チェック対象文字列が半角英字のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角英字の場合はtrue、
 * 半角英字以外の文字が含まれている場合はfalse
 */
function isAlphabet(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[^A-Z|^a-z]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/**
 * チェック対象文字列が全角ひらがなのみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て全角ひらがなの場合はtrue、
 * 全角ひらがな以外の文字が含まれている場合はfalse
 */
function isHiragana(argValue) {
  if(!argValue || argValue == undefined || argValue == ""){
    return true;
  }
  if (argValue.match(/[^ぁ-ん|^ー]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/**
 * チェック対象文字列が全角のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て全角文字の場合はtrue、
 * 全角文字以外が含まれている場合はfalse
 */
function isAllFullSize(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  var length = argValue.length * 2;
  if (length == getByteLength(argValue)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * チェック対象文字列が半角のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角文字だった場合はtrue、
 * 半角文字以外が含まれている場合はfalse
 */
function isAllHalfSize(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  var length = argValue.length;
  if (length == getByteLength(argValue)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * 指定された文字列が有効な日付かチェックします。
 * ※閏年判定含む。
 *
 * @param argValue チェック対象日付(8桁の半角数字(yyyymmdd)の書式)
 * @return 日付として有効な場合はtrue、
 * 日付として無効な場合はfalse
 */
function isDate(argValue) {
  if (isEmpty(argValue)) {
    // 未入力の場合
    return false;
  }
  if (argValue.length != 8) {
    // ８桁以外の場合
    return false;
  }
  if (!isNumeric(argValue)) {
    // 半角数字以外の文字列が含まれている場合
    return false;
  }

  var iYear = parseInt(argValue.substr(0, 4));
  var iMonth = parseInt(argValue.substr(4, 2));
  var iDay = parseInt(argValue.substr(6, 2));
  var iMaxDayOfMonth = Array(31, 29, 31, 30, 31, 30,
      31, 31, 30, 31, 30, 31);

  if (iMonth < 1 || iMonth > 12) {
    return false;
  }
  if (iDay < 1 || iDay > iMaxDayOfMonth[iMonth - 1]) {
    return false;
  }
  if (iMonth != 2) {
    return true;
  }
  if (iDay > 29) {
    return true;
  }
  if ((iYear % 4) == 0 && (iYear % 100) != 0) {
    return true;
  }
  if ((iYear % 400) == 0) {
    return true;
  }
  return false;
}

/**
 * 指定された文字列がメールアドレスとして有効かどうかチェックします。
 * ※xxxxx@xxxxx.xxxの形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 * @return メールアドレスとして有効な場合はtrue、
 * メールアドレスとして無効な場合はfalse
 */
function isMailAddress(argValue) {
  if (isEmpty(argValue)) {
    return false;
  }
  if (argValue.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * 指定された文字列が電話番号として有効かどうかチェックします。
 * ※9999-9999-9999の形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 */
function isTelNumber(argValue) {
  if (isEmpty(argValue)) {
    return false;
  }
  if (argValue.match(/^(?:\+?\d+-)?\d+(?:-\d+){2}$|^\+?\d+$/)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * 指定された文字列が郵便番号として有効かどうかチェックします。
 * ※999-9999、999-99、999の形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 * @return 郵便番号として有効な場合はtrue、
 * 郵便番号として無効な場合はfalse
 */
function isZipCode(argValue) {
  if (isEmpty(argValue)) {
    return false;
  }
  if (argValue.match(/^\d{3}$|^\d{3}-\d{2}$|^\d{3}-\d{4}$/)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * マイナス符号チェックを行います。
 * ・パターンマッチ 0～9、"-"
 * ・マイナス符号の数 0 or 1
 *
 * 例）
 * -123 --> OK
 * 123 --> OK
 * - --> NG
 * 123- --> NG
 * --123 --> NG
 *
 * @param argValue チェック対象文字列
 * @return チェックＯＫの場合はtrue、
 * チェックＮＧの場合はfalse
 */
function isMinus(argValue) {
  if (argValue.match(/[^0-9|^\-]/g)) {
    // パターンマッチ 0～9,"-"以外はＮＧ
    return false;
  }
  // "-"の入力個数を取得する
  var count = 0;
  for (var i = 0; i < argValue.length; i++) {
    if (argValue.charAt(i) == "-") {
      count++;
    }
  }
  if (2 <= count) {
    // "-"が２つ以上入力されている場合はＮＧ
    return false;
  }
  if (count == 1 && argValue.charAt(0) != "-") {
    // "-"が入力されていて、かつ先頭に"-"がない場合はＮＧ
    return false;
  }
  if (count == 1 && argValue.length == 1) {
    // "-"が入力されていて、"-"のみの入力はＮＧ
    return false;
  }
  return true;
}

/**
 * 小数点チェックを行います。
 * ・パターンマッチ 0～9、"."
 * ・小数点の数 0 or 1
 * ・整数部の桁数チェック
 * ・小数部の桁数チェック
 *
 * 例）整数部 3, 小数部 2の場合
 * 123 --> OK
 * 123.45 --> OK
 * 1.2 --> OK
 * 1234.56 --> NG
 * 123.456 --> NG
 * . --> NG
 * .123 --> NG
 * 123. --> NG
 *
 * @param argValue チェック対象文字列
 * @param argIntKetasu 整数部の入力可能桁数
 * @param argDecimalKetasu 小数部の入力可能桁数
 * @return チェックＯＫの場合はtrue、
 * チェックＮＧの場合はfalse
 */
function isDecimal(argValue, argIntKetasu, argDecimalKetasu) {
  if (argValue.match(/[^0-9|^.]/g)) {
    // パターンマッチ 0～9,"."以外はＮＧ
    return false;
  }

  // 小数点の数を取得する
  var count = 0;
  for (var i = 0; i < argValue.length; i++) {
    if (argValue.charAt(i) == ".") {
      count++;
    }
  }
  if (2 <= count) {
    // "."が２つ以上入力されている場合はＮＧ
    return false;
  }
  if (argValue.charAt(0) == ".") {
    // 先頭に小数点が入力された場合はＮＧ
    return false;
  }

  // 小数点以下のチェック
  if (count == 1) {
    // 小数点が入力された場合のみチェック
    // 小数点以下の桁数チェック
    var idx = argValue.lastIndexOf(".");
    var decimalPart = argValue.substring(idx);
    // 小数点以下の桁数を取得する
    var length = decimalPart.length - 1;
    if (length == 0) {
      // 小数点以下の入力がない場合はＮＧ
      return false;
    }
    if (argDecimalKetasu < length) {
      // 小数点以下の桁数がオーバーしている場合はＮＧ
      return false;
    }
  }

  // 整数部の桁数チェック
  var intPart = "";
  if (count == 1) {
    // 小数点が入力された場合
    intPart = argValue.substring(0, argValue.indexOf("."));
  }
  else {
    intPart = argValue;
  }
  if (argIntKetasu < intPart.length) {
    // 整数の桁数がオーバーしている場合はＮＧ
    return false;
  }
  return true;
}

/**
 * マイナス符号付小数点チェックを行います。
 * ・パターンマッチ 0～9、"-"、"."
 * ・パターンマッチ "-","."のみはＮＧ
 * ・マイナス符号の数 0 or 1
 * ・小数点の数 0 or 1
 * ・整数部の桁数チェック
 * ・小数部の桁数チェック
 *
 * 例）整数部 3, 小数部 2の場合
 * -123 --> OK
 * 123 --> OK
 * 123.45 --> OK
 * -123.45 --> OK
 * 1.2 --> OK
 * - --> NG
 * 123- --> NG
 * --123 --> NG
 * 1234.56 --> NG
 * 123.456 --> NG
 * . --> NG
 * .123 --> NG
 * 123. --> NG
 * -. --> NG
 *
 * @param argValue チェック対象文字列
 * @param argIntKetasu 整数部の入力可能桁数
 * @param argDecimalKetasu 小数部の入力可能桁数
 * @return チェックＯＫの場合はtrue、
 * チェックＮＧの場合はfalse
 */
function isMinusDecimal(argValue, argIntKetasu, argDecimalKetasu) {
  var minusFlg = false;
  var decFlg = false;
  if (argValue.match(/[^0-9|^\-|^.]/g)) {
    // パターンマッチ 0～9,"-","."以外はＮＧ
    return false;
  }
  if (argValue.match(/[^\-|^.]/g)) {
  }
  else {
    // パターンマッチ "-","."のみはＮＧ
    return false;
  }

  // 小数点の数を取得する
  var count = 0;
  for (var i = 0; i < argValue.length; i++) {
    if (argValue.charAt(i) == ".") {
      decFlg = true;
      count++;
    }
  }
  if (2 <= count) {
    // "."が２つ以上入力されている場合はＮＧ
    return false;
  }

  // "-"の入力個数を取得する
  count = 0;
  for (i = 0; i < argValue.length; i++) {
    if (argValue.charAt(i) == "-") {
      minusFlg = true;
      count++;
    }
  }
  if (2 <= count || (count == 1 && argValue.charAt(0) != "-")) {
    // "-"が２つ以上入力されている場合はＮＧ
    // "-"が入力されていて、かつ先頭に"-"がない場合はＮＧ
    return false;
  }

  // 小数点以下のチェック
  if (decFlg) {
    // 小数点以下の桁数チェック
    var idx = argValue.lastIndexOf(".");
    var decimalPart = argValue.substring(idx);

    // 小数点以下の桁数を取得する
    var length = decimalPart.length - 1;
    if (length == 0) {
      // 小数点以下の入力がない場合はＮＧ
      return false;
    }
    if (argDecimalKetasu < length) {
      // 小数点以下の桁数がオーバーしている場合はＮＧ
      return false;
    }
  }

  // 整数部の桁数チェック
  var intPart = "";
  length = 0;
  if (decFlg) {
    // 小数点が入力された場合
    intPart = argValue.substring(0, argValue.indexOf("."));
  }
  else {
    intPart = argValue;
  }
  length = intPart.length;
  if (minusFlg) {
    // マイナスが入力された場合は-1
    length--;
  }
  if (argIntKetasu < length) {
    // 整数の桁数がオーバーしている場合はＮＧ
    return false;
  }
  return true;
}

/**
 * チェック対象文字列のバイト数を取得します。
 *
 * @param argValue チェック対象文字列
 * @return 文字列のバイト数
 */
function getByteLength(argValue) {
  var str_obj = new String(argValue);
  var HALF_SIZE_KANA = "ｧｱｨｲｩｳｪｴｫｵｶｷｸｹｺｻｼｽｾｿﾀﾁｯﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓｬﾔｭﾕｮﾖﾗﾘﾙﾚﾛﾜｦﾝｰﾟﾞ";
  var i = 0;
  var count = 0;
  for (i = 0; i < str_obj.length; i++) {
    if (0 <= HALF_SIZE_KANA.indexOf(str_obj.charAt(i))) {
      // 半角カタカナの場合は1バイトとして計算します
      count++;
    }
    else if (escape(str_obj.charAt(i)).length >= 4) {
      count += 2;
    }
    else {
      count++;
    }
  }
  return count;
}

/**
 * 全角相当の文字数を返す
 */
function getStrLength(argValue) {
  var ret = getByteLength(argValue) / 2;
  return ret;
}

/***
 * 拡張子がjpg gif png jpeg ならTrueを返す
 * fineNameが空ならＴｒｕｅを返す
 */
function imageExtensionCheck(fileName) {
  if (!fileName) return true;
  ext_array = fileName.split(".").reverse();
  var ext = ext_array[0];
  if (ext.match(/(jpg|gif|png|jpeg)/i)) {
    return true;
  }
  return false;
}

/**
 * ファイル名から拡張子を返す
 */
function getExt(filename)
{
    let pos = filename.lastIndexOf('.');
    if (pos === -1) return '';
    return filename.slice(pos + 1);
}

/**
 *拡張子がCSVならTrueを返す
 */
function extensionCheckCSV(fileName) {
  if (!fileName) return true;
  let ext_array = fileName.split(".").reverse();
  let ext = ext_array[0];
  if (ext.match(/(csv)/i)) {
    return true;
  }
  return false;
};


/**
 *拡張子がpdfならTrueを返す
 */
function extensionCheckPDF(fileName) {
  if (!fileName) return true;
  let ext_array = fileName.split(".").reverse();
  let ext = ext_array[0];
  if (ext.match(/(pdf)/i)) {
    return true;
  }
  return false;
};

/**
 * URLの形式ならTrueを返す
 * @param val
 */
function isUrl(str) {
  let pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
      '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
      '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
      '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
      '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
      '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator

  if (!pattern.test(str)) {
    return false;
  } else {
    return true;
  }
}

/**
 * 全角カタカナならTrueを返す
 */
function zen_katakana(str) {
  str = (str == null) ? "" : str;
  if (str.match(/^[ァ-ヶー　]*$/)) {    //"ー"の後ろの文字は全角スペースです。
    return true;
  } else {
    return false;
  }
}

/**
 * 改行コードを<br />に置き換える
 */
function nl2br(str) {
  if (!str) return;
  return str.replace(/[\n\r]/g, "<br />");
}

/**
 * チェック対象文字列が全角カタカナのみかチェックします。
 *
 * @param argValue チェック対象文字列
 * 全角カタカナ以外の文字が含まれている場合はfalse
 */
function isZenKatakana(arg) {
  if (!arg || arg == undefined) return false;
  return arg.match(/^[ア|ァ|イ|ィ|ウ|ヴ|ゥ|エ|ェ|オ|ォ|ー|カ|ガ|キ|ギ|ク|グ|ケ|ゲ|コ|ゴ|サ|ザ|シ|ジ|ス|ズ|セ|ゼ|ソ|ゾ|タ|ダ|チ|ヂ|ツ|ヅ|ッ|テ|デ|ト|ド|ナ|ニ|ヌ|ネ|ノ|ハ|バ|パ|ヒ|ビ|ピ|フ|ブ|プ|ヘ|ベ|ペ|ホ|ボ|ポ|マ|ミ|ム|メ|モ|ヤ|ャ|ユ|ュ|ヨ|ョ|ラ|リ|ル|レ|ロ|ワ|ヲ|ン| |　]+$/) ? true : false;
}

var setPageScrollable = function setPageScrollable(scrollable) {
  var dv = window;
  var xOffset, yOffset, de;
  if (document.defaultView) {
    dv = document.defaultView;
    xOffset = dv.pageXOffset;
    yOffset = dv.pageYOffset;
  } else {
    de = document.documentElement;
    xOffset = de.scrollLeft;
    yOffset = de.scrollTop;
  }
  document.documentElement.style.overflow = ( scrollable ? "auto" : "hidden" );
  dv.scrollTo(xOffset, yOffset);
}

function getFileName() {
  return window.location.href.split('/').pop();
}

/**
 * すべて半角英数、いくつかの記号の場合TRUEを返す
 */
function isAlNumSymbol(argValue) {
  if(!argValue || argValue == "" || argValue == undefined){
    return false;
  }
  if (argValue.match(/[0-9a-zA-Z\-\_\=\(\)\+\%\$\#\"\?\*\!]/g)) {
    return true;
  }
  else {
    return false;
  }
}

/**
 * 画像ドラッグアンドドロップ
 */
$(document).on('drop dragover', function (e) {
  if(e.target.accept != ".jpg,.png,.gif,image/jpeg"){
    e.stopPropagation();
    e.preventDefault();
  }
});

/**
 * ユニークな文字を返す
 */
function getUniqueStr(myStrong){
  let strong = 1000;
  if (myStrong) strong = myStrong;
  return new Date().getTime().toString(16)  + Math.floor(strong*Math.random()).toString(16)
}

/**
 * HTMLタグをエスケープした文字を返す
 */
function escape_html (string) {
  if (typeof string !== 'string') {
    return string;
  }
  return string.replace (/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}

/**
 * クリップボードにコピー
 */
function copy(str) {
    if(!str || typeof(str) != "string") {
        return "";
    }
    $(document.body).append("<textarea id=\"tmp_copy\" style=\"position:fixed;right:100vw;font-size:16px;\" readonly=\"readonly\">" + str + "</textarea>");
    let elm = $("#tmp_copy")[0];
    elm.select();
    let range = document.createRange();
    range.selectNodeContents(elm);
    let sel = window.getSelection();
    sel.removeAllRanges();
    sel.addRange(range);
    elm.setSelectionRange(0, 999999);
    document.execCommand("copy");
    $(elm).remove();
}

function htmlspecialchars_decode(string, quote_style) {
    //       discuss at: http://phpjs.org/functions/htmlspecialchars_decode/
    //      original by: Mirek Slugen
    //      improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    //      bugfixed by: Mateusz "loonquawl" Zalega
    //      bugfixed by: Onno Marsman
    //      bugfixed by: Brett Zamir (http://brett-zamir.me)
    //      bugfixed by: Brett Zamir (http://brett-zamir.me)
    //         input by: ReverseSyntax
    //         input by: Slawomir Kaniecki
    //         input by: Scott Cariss
    //         input by: Francois
    //         input by: Ratheous
    //         input by: Mailfaker (http://www.weedem.fr/)
    //       revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // reimplemented by: Brett Zamir (http://brett-zamir.me)
    //        example 1: htmlspecialchars_decode("<p>this -&gt; &quot;</p>", 'ENT_NOQUOTES');
    //        returns 1: '<p>this -> &quot;</p>'
    //        example 2: htmlspecialchars_decode("&amp;quot;");
    //        returns 2: '&quot;'

    var optTemp = 0,
        i = 0,
        noquotes = false;
    if (typeof quote_style === 'undefined') {
        quote_style = 2;
    }
    string = string.toString()
                   .replace(/&lt;/g, '<')
                   .replace(/&gt;/g, '>');
    var OPTS = {
        'ENT_NOQUOTES': 0,
        'ENT_HTML_QUOTE_SINGLE': 1,
        'ENT_HTML_QUOTE_DOUBLE': 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE': 4
    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') {
        // Allow for a single string or an array of string flags
        quote_style = [].concat(quote_style);
        for (i = 0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
            } else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }
        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
        // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
    }
    if (!noquotes) {
        string = string.replace(/&quot;/g, '"');
    }
    // Put this in last place to avoid escape being double-decoded
    string = string.replace(/&amp;/g, '&');

    return string;
}

