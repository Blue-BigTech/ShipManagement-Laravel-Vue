<?php

namespace App\Traits;

trait BaseCrud
{
    /**
     * 全件取得
     *
     * @return array
     */
    public function fetchIndex()
    {
        return $this->get();
    }

    /**
     * 1件取得
     *
     * @param int $request
     * @param mixed $id
     * @return object
     */
    public function fetchShow($id)
    {
        return $this->findOrFail($id);
    }

    /**
     * 新規登録
     *
     * @param Request $request
     * @return object
     */
    public function storeData($request)
    {
        $record = new $this;
        $record->fill($request->all())->save();
        return $record;
    }

    /**
     * 更新処理
     *
     * @param Request $request
     * @param int $id
     * @return object
     */
    public function updateData($id, $request)
    {
        $record = $this->findOrFail($id);
        $record->fill($request->all())->save();
        return $record;
    }

    /**
     * 削除
     *
     * @param int $id
     */
    public function deleteData($id)
    {
        $record = $this->findOrFail($id);
        $record->delete();
    }

    // TODO: 使えないようだったら削除する
    /**
     * 物理削除
     *
     * @param int $id
     */
    public function forceDeleteData($id)
    {
        $record = $this->whereIn('id', $id)->get();
        $record->delete();
    }
}
