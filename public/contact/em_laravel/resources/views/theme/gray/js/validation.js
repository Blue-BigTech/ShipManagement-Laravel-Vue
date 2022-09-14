/****************************************************************
 * 全角/半角文字判定
 *
 * 引数 ： str チェックする文字列
 * flg 0:半角文字、1:全角文字
 * 戻り値： true:含まれている、false:含まれていない
 *
 ****************************************************************/
function incZenHan(str, flg) {
  for (let i = 0; i < str.length; i++) {
    let c = str.charCodeAt(i);
    if ((c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) {
      if (!flg) return true;
    }
    else {
      if (flg) return true;
    }
  }
  return false;
}


/***********************************************************
 *
 * 半角ｶﾅが混じってるとFalseを返す
 *
 ***********************************************************/
function incNotHanChar(val) {
  let hc = "｡｢｣､･ｦｧｨｩｪｫｬｭｮｯｰｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝﾞﾟ";
  val = String(val);
  for (let i = 0; i < val.length; i++) {
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
  let vYear = datestr.substr(0, 4) - 0;
  let vMonth = datestr.substr(5, 2) - 1; // Javascriptは、0-11で表現
  let vDay = datestr.substr(8, 2) - 0;
  // 月,日の妥当性チェック
  if (vMonth >= 0 && vMonth <= 11 && vDay >= 1 && vDay <= 31) {
    let vDt = new Date(vYear, vMonth, vDay);
    if (isNaN(vDt)) {
      return false;
    }
    else if (vDt.getFullYear() == vYear && vDt.getMonth() == vMonth && vDt.getDate() == vDay) {
      return true;
    }
    else {
      return false;
    }
  }
  else {
    return false;
  }
}

/***********************************************************
 * カウントした文字数を返す
 * 全角1つ→2文字
 * 半角1つ→1文字
 * @param strSrc
 * @returns {Number}
 **********************************************************/
function strLength(strSrc) {
  len = 0;
  strSrc = escape(strSrc);
  for (let i = 0; i < strSrc.length; i++, len++) {
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

/***********************************************************
 * チェック対象文字列が入力されているかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 文字列が入力されている場合はtrue、
 * 文字列が入力されていない場合はfasle
 **********************************************************/
function isNotEmpty(argValue) {
  if (argValue == "" || argValue == null) {
    return false;
  }
  return true;
}

/***********************************************************
 * チェック対象文字列が入力されていないかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 文字列が入力されていない場合はtrue、
 * 文字列が入力されているの場合はfasle
 **********************************************************/
function isEmpty(argValue) {
  if (argValue == "" || argValue == null) {
    return true;
  }
  return false;
}

/***********************************************************
 * チェック対象文字列が半角数字のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角数字の場合はtrue、
 * 半角数字以外の文字が含まれている場合はfalse
 **********************************************************/
function isNumeric(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/[^0-9|]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/***********************************************************
 * チェック対象文字列が半角数字（小数点、符号を含む）のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 有効文字列（"0123456789"および".-+"）のみで構成されている場合はtrue、
 * 有効文字列以外の文字が含まれている場合はfalse
 **********************************************************/
function isNumericDecimal(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/[^0-9|^.+-]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/***********************************************************
 * チェック対象文字列が半角英数字のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角英数字の場合はtrue、
 * 半角英数字以外の文字が含まれている場合はfalse
 **********************************************************/
function isAlphabetNumeric(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/[^A-Z|^a-z|^0-9]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/***********************************************************
 * チェック対象文字列が半角数字と半角英字との混在をチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 半角数字と半角英字が含まれていて、それ以外の文字が含まれていない場合にtrueを返す
 **********************************************************/
function isAlphabetNumericMix(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/[^A-Z|^a-z|^0-9]/g)) {
    return false;
  }
  let num_flag = false;
  if (argValue.match(/[0-9\-]/g)) {
    num_flag = true;
  }
  let alphabet_flag = false;
  if (argValue.match(/[a-zA-Z\-]/g)) {
    alphabet_flag = true;
  }
  if (num_flag == true && alphabet_flag == true) {
    return true;
  }
  else {
    return false;
  }
}


/***********************************************************
 *
 * すべて半角英数ハイフンの場合TRUEを返す
 *
 **********************************************************/
function isAlNumHyphen(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/^[a-zA-Z0-9-]*$/g)) {
    return true;
  }
  else {
    return false;
  }
}

/***********************************************************
 *
 * すべて半角数字ハイフンの場合TRUEを返す
 *
 **********************************************************/
function isNumHyphen(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/^[0-9-]*$/g)) {
    return true;
  }
  else {
    return false;
  }
};

/***********************************************************
 *
 * すべて半角数字、アンダースコアの場合TRUEを返す
 *
 **********************************************************/
function isNumUnderS(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/^[0-9_]*$/g)) {
    return true;
  }
  else {
    return false;
  }
};

/***********************************************************
 *
 * すべて半角英字、アンダースコアの場合TRUEを返す
 *
 **********************************************************/
function isAlUnderS(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/^[a-zA-Z_]*$/g)) {
    return true;
  }
  else {
    return false;
  }
};


/***********************************************************
 *
 * 全て半角英数、ハイフン、アンダースコアの場合Trueを返す
 *
 **********************************************************/
function isAlNumHyphenUnderS(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/^[a-zA-Z0-9_-]*$/g)) {
    return true;
  }
  else {
    return false;
  }
};


/***********************************************************
 * チェック対象文字列が半角英字のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角英字の場合はtrue、
 * 半角英字以外の文字が含まれている場合はfalse
 **********************************************************/
function isAlphabet(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  if (argValue.match(/[^A-Z|^a-z]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/***********************************************************
 * チェック対象文字列が全角ひらがなのみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て全角ひらがなの場合はtrue、
 * 全角ひらがな以外の文字が含まれている場合はfalse
 **********************************************************/
function isHiragana(argValue) {
  if (!argValue || argValue == undefined || argValue == "") {
    return false;
  }
  if (argValue.match(/[^ぁ-ん|^ー]/g)) {
    return false;
  }
  else {
    return true;
  }
}

/***********************************************************
 * チェック対象文字列が全角のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て全角文字の場合はtrue、
 * 全角文字以外が含まれている場合はfalse
 **********************************************************/
function isAllFullSize(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  return (argValue.match(/^[^\x01-\x7E\xA1-\xDF]+$/)) ? true : false;
}

/***********************************************************
 * チェック対象文字列が半角のみかチェックします。
 *
 * @param argValue チェック対象文字列
 * @return 全て半角文字だった場合はtrue、
 * 半角文字以外が含まれている場合はfalse
 **********************************************************/
function isAllHalfSize(argValue) {
  if (!argValue || argValue == "" || argValue == undefined) {
    return false;
  }
  return !argValue.match(/[^\x01-\x7E]/) || !argValue.match(/[^\uFF65-\uFF9F]/);
}

/***********************************************************
 * 指定された文字列が有効な日付かチェックします。
 * ※閏年判定含む。
 *
 * @param argValue チェック対象日付(8桁の半角数字(yyyymmdd)の書式)
 * @return 日付として有効な場合はtrue、
 * 日付として無効な場合はfalse
 **********************************************************/
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

  let iYear = parseInt(argValue.substr(0, 4));
  let iMonth = parseInt(argValue.substr(4, 2));
  let iDay = parseInt(argValue.substr(6, 2));
  let iMaxDayOfMonth = Array(31, 29, 31, 30, 31, 30,
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

/***********************************************************
 * 指定された文字列がメールアドレスとして有効かどうかチェックします。
 * ※xxxxx@xxxxx.xxxの形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 * @return メールアドレスとして有効な場合はtrue、
 * メールアドレスとして無効な場合はfalse
 **********************************************************/
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

/***********************************************************
 * 指定された文字列が電話番号として有効かどうかチェックします。
 * ※999-9999-9999の形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 **********************************************************/
function isHyphenTelNumber(argValue) {
  if (isEmpty(argValue)) {
    return false;
  }
  // if (argValue.match (/^(?:\+?\d+-)?\d+(?:-\d+){2}$|^\+?\d+$/)) {
  //     return true;
  // }
  if (argValue.match(/^(\d{2,3}-){0,1}\d{1,4}-\d{2,4}-\d{2,4}$/)) {
    return true;
  }
  else {
    return false;
  }
}

/***********************************************************
 * 指定された文字列が電話番号として有効かどうかチェックします。
 * ※99999999999の形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 **********************************************************/
function isTelNumber(argValue) {
  if (isEmpty(argValue)) {
    return false;
  }
  if (argValue.match(/^\d{8,12}$/)) {
    return true;
  }
  else {
    return false;
  }
}

/***********************************************************
 * 指定された文字列が郵便番号として有効かどうかチェックします。
 * ※999-9999、999-99、999の形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 * @return 郵便番号として有効な場合はtrue、
 * 郵便番号として無効な場合はfalse
 **********************************************************/
function isHyphenZipCode(argValue) {
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

/***********************************************************
 * 指定された文字列が郵便番号として有効かどうかチェックします。
 * ※9999999の形式と一致するかどうかで判断します。
 *
 * @param argValue チェック対象文字列
 * @return 郵便番号として有効な場合はtrue、
 * 郵便番号として無効な場合はfalse
 **********************************************************/
function isZipCode(argValue) {
  if (isEmpty(argValue)) {
    return false;
  }
  if (argValue.match(/^\d{7}$/)) {
    return true;
  }
  else {
    return false;
  }
}

/***********************************************************
 *
 * 全角カタカナ（全角スペース可）ならTrueを返す
 *
 **********************************************************/
function zen_katakana(str) {
  str = (str == null) ? "" : str;
  if (str.match(/^[ァ-ヶー　]*$/)) {    //"ー"の後ろの文字は全角スペースです。
    return true;
  }
  else {
    return false;
  }
}

/***********************************************************
 * チェック対象文字列が全角カタカナのみかチェックします。
 *
 * @param argValue チェック対象文字列
 * 全角カタカナ（全角スペース可）ならTrueを返す
 *
 * 全角カタカナ以外の文字が含まれている場合はfalse
 **********************************************************/
function isZenKatakana(argValue) {
  if (!argValue || argValue == undefined) return false;
  return argValue.match(/^[ア|ァ|イ|ィ|ウ|ヴ|ゥ|エ|ェ|オ|ォ|ー|カ|ガ|キ|ギ|ク|グ|ケ|ゲ|コ|ゴ|サ|ザ|シ|ジ|ス|ズ|セ|ゼ|ソ|ゾ|タ|ダ|チ|ヂ|ツ|ヅ|ッ|テ|デ|ト|ド|ナ|ニ|ヌ|ネ|ノ|ハ|バ|パ|ヒ|ビ|ピ|フ|ブ|プ|ヘ|ベ|ペ|ホ|ボ|ポ|マ|ミ|ム|メ|モ|ヤ|ャ|ユ|ュ|ヨ|ョ|ラ|リ|ル|レ|ロ|ワ|ヲ|ン| |　]+$/) ? true : false;
}
