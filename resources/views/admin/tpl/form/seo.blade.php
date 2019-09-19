<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">SEO标题</label>
    <div class="layui-input-block">
        <input name="seo_title" value="{{ $data['seo_title']??'' }}" class="layui-input" placeholder="SEO标题">
    </div>
</div>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">SEO关键词</label>
    <div class="layui-input-block">
        <textarea name="seo_key"  class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割">{{ $data['seo_key']??'' }}</textarea>
    </div>
</div>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">SEO描述</label>
    <div class="layui-input-block">
        <textarea name="seo_desc" class="layui-textarea">{{ $data['seo_desc']??'' }}</textarea>
    </div>
</div>