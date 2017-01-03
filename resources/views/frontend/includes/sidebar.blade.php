<script>
$(document).ready(function(){
    $("#fuzhi").zclip({
       	path:'{!! asset('/js/ZeroClipboard.swf') !!}', 
        copy:function(){
            return $('#sxjieguo').val();
        },
        afterCopy: function(){//复制成功 
			alert('复制成功！');
		} 
    });
})
</script>
<div class="sidebar">
	<div class='content' id="cebiao">
		<div class="title">
			分析所选数据
		</div>
		<div class="dmhmzinfo">
			<div class="numstype">
				<span class="types">号码类型：</span>
				<input type="radio" checked="true" class="numtype" name="numtype" value = "1"/> <span class='dxzxdcss'>胆码</span>
				<input type="radio" class="numtype" name="numtype" value = "2"/> <span class='dxzxdcss'>号码组</span>
			</div>
			<h6>请选择号码：</h6>
			<div class="numdatas">
				<button data-num='0' class="chosnum">0</button>
				<button data-num='1' class="chosnum">1</button>
				<button data-num='2' class="chosnum">2</button>
				<button data-num='3' class="chosnum">3</button>
				<button data-num='4' class="chosnum">4</button>
				<button data-num='5' class="chosnum">5</button>
				<button data-num='6' class="chosnum">6</button>
				<button data-num='7' class="chosnum">7</button>
				<button data-num='8' class="chosnum">8</button>
				<button data-num='9' class="chosnum">9</button>
				<button data-num=',' class="chosnum">,</button>
			</div>
			<h6>您选取的号码是：</h6>
			<div class="chonum">
				<textarea id="mychonum" class="mychonum"></textarea>
				<div class="mychonumsm">
					<h5>说明：</h5>
					<p>左边您点击选取的号码也可以手动输入您即将要筛选分析的号码！</p>
				</div>
				<div class="numcount">
					<ul>
						<li>
							<input type="radio" class="numcountra" name='numcount' value = "0"  />
							&nbsp;出现 0 次
						</li>
						<li>
							<input type="radio" class="numcountra" name='numcount' value = "1"  />
							&nbsp;出现 1 次
						</li>
						<li>
							<input type="radio" class="numcountra" name='numcount' value = "2"  />
							&nbsp;出现 2 次
						</li>
						<li>
							<input type="radio" class="numcountra" name='numcount' value = "3"  />
							&nbsp;出现 3 次
						</li>
						<li>
							<input type="radio" class="numcountra" name='numcount' value = "4"  />
							&nbsp;出现 4 次
						</li>
						<li>
							<input type="radio" class="numcountra" name='numcount' value = "5"  />
							&nbsp;出现 5 次
						</li>
					</ul>
				</div>
			</div>
			<div style="clear:both;" class="dmhmzhr">
				<hr />
			</div>
			<div class="copynumdm">
				<a href="javascript:void(0)" class="btn-scdm ershi"  id="dmsave">保留</a>
				<a href="javascript:void(0)" class="btn-scdm ershi"  id="dxzxvb">转组选</a>
				<a href="javascript:void(0)" class="btn-scdm sanshi" id="dmqfan">排除</a>
				<a href="#" class="btn-scdm wushi " id="fuzhi">复制</a>
				<a href="javascript:void(0)" class="btn-scdm yibai"  id="qingchu">清除</a>
				<a href="javascript:void(0)" class="btn-scdm woqu">发送</a>
			</div>
			<textarea name="" id="sxjieguo" class="dmfxjg">
	    	</textarea>
	    	<div id="dmfxzs" style="text-align:center;color:#f00;font-size:14px;">
	    	</div>
		</div>
	</div>
	<button class="annius">
		<h2>
			一键出号
		</h2>
	</button>
</div>
