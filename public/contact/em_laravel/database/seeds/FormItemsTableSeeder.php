<?php

use Illuminate\Database\Seeder;

class FormItemsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table( 'form_items' )
      ->insert( [
        [ //お問い合わせフォームをプリセット
          'id'                                         => 1,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 1,
          'form_id'                                    => 1,
          'form_block_id'                              => 24, //お名前（法人名）
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 2,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 2,
          'form_id'                                    => 1,
          'form_block_id'                              => 17, //担当者名
          'required'                                   => 0,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 3,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 3,
          'form_id'                                    => 1,
          'form_block_id'                              => 7, //メールアドレス
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 4,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 4,
          'form_id'                                    => 1,
          'form_block_id'                              => 23, //URL
          'required'                                   => 0,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 5,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 5,
          'form_id'                                    => 1,
          'form_block_id'                              => 6, //電話番号
          'required'                                   => 0,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 6,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 6,
          'form_id'                                    => 1,
          'form_block_id'                              => 21, //住所
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 7,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 7,
          'form_id'                                    => 1,
          'form_block_id'                              => 9, //お問い合せ内容
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [//イベント申し込みフォームプリセット
          'id'                                         => 8,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 1,
          'form_id'                                    => 2,
          'form_block_id'                              => 25, //参加希望日
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 9,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 2,
          'form_id'                                    => 2,
          'form_block_id'                              => 16, //会社名
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 10,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 3,
          'form_id'                                    => 2,
          'form_block_id'                              => 40, //お名前(フリガナ補完)
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 11,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 5,
          'form_id'                                    => 2,
          'form_block_id'                              => 21, //住所
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 12,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 6,
          'form_id'                                    => 2,
          'form_block_id'                              => 6, //電話番号
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 13,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 7,
          'form_id'                                    => 2,
          'form_block_id'                              => 7, //メールアドレス
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 14,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 8,
          'form_id'                                    => 2,
          'form_block_id'                              => 8, //メールアドレス確認用
          'required'                                   => 1,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 15,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 9,
          'form_id'                                    => 2,
          'form_block_id'                              => 27, //何を見て知りましたか？
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 16,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 10,
          'form_id'                                    => 2,
          'form_block_id'                              => 28, //紹介者（いない場合はなし）
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 17,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 11,
          'form_id'                                    => 2,
          'form_block_id'                              => 26, //ご意見・ご質問等
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 18,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 12,
          'form_id'                                    => 2,
          'form_block_id'                              => 29, //個人情報の取り扱いについて
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [//アンケートフォームプリセット
          'id'                                         => 19,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 1,
          'form_id'                                    => 3,
          'form_block_id'                              => 30, //あなたは、○○を何から見聞きして知りましたか。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 20,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 2,
          'form_id'                                    => 3,
          'form_block_id'                              => 31, //○○をどこで購入しましたか。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 21,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 3,
          'form_id'                                    => 3,
          'form_block_id'                              => 32, //○○を購入した理由をすべてお知らせください。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 22,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 4,
          'form_id'                                    => 3,
          'form_block_id'                              => 33, //○○に対して、総合的にどのくらい満足していますか。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 23,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 5,
          'form_id'                                    => 3,
          'form_block_id'                              => 34, //○○に対して前問のように回答した理由をお書きください。
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 24,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 6,
          'form_id'                                    => 3,
          'form_block_id'                              => 35, //味の満足度についてお知らせください。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 25,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 7,
          'form_id'                                    => 3,
          'form_block_id'                              => 36, //量の満足度についてお知らせください。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 26,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 8,
          'form_id'                                    => 3,
          'form_block_id'                              => 37, //価格の満足度についてお知らせください。
          'required'                                   => 1,
          'real_time_validation'                       => 0,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 27,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 9,
          'form_id'                                    => 3,
          'form_block_id'                              => 26, //ご意見・ご質問等
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 28,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 10,
          'form_id'                                    => 3,
          'form_block_id'                              => 38, //性別
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 29,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 11,
          'form_id'                                    => 3,
          'form_block_id'                              => 39, //年齢
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
        [
          'id'                                         => 30,
          'created_at'                                 => new DateTime(),
          'updated_at'                                 => new DateTime(),
          'view_no'                                    => 12,
          'form_id'                                    => 3,
          'form_block_id'                              => 4, //都道府県
          'required'                                   => 0,
          'real_time_validation'                       => 1,
          're_enter_html_id'                           => '',
        ],
      ]);
    }
}
