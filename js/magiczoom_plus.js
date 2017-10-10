/**
 * 产品名称: Ecshop生鲜蔬菜商城模板 
 * 使用版本：Ecshop v2.7.3版
 * 出品单位: O菜龙工作室出品
 * 设计者网址：http://www.ocailong.com/
 * 设计者QQ：763191200（o菜龙）
*/
function changeAtt(t,goods_id) {
	if(t.lastChild.checked != undefined){
		t.lastChild.checked='checked';
	}
	for (var i = 0; i<t.parentNode.childNodes.length;i++) {
		if (t.parentNode.childNodes[i].className == 'cattsel') {
			t.parentNode.childNodes[i].className = '';
		}
	}

	t.className = "cattsel";
	var formBuy = document.forms['ECS_FORMBUY'];
	spec_arr = getSelectedAttributes(formBuy);
	Ajax.call('goods.php?act=get_products_info', 'id=' + spec_arr+ '&goods_id=' + goods_id, shows_number, 'GET', 'JSON');
	changePrice();    // By www.de11.cn

}

function show_attr_status(theid, goods_id, attr_id_www_de11_cn)
{

	var selected_first=new Array();
	selected_first[0] = theid.id.replace('xuan_a_','');
	var spec_attr_type = document.getElementsByName('spec_attr_type');

	var mylist = theid.parentNode.getElementsByTagName("a");
	for(zzz=0; zzz<mylist.length; zzz++)
	{
		if(mylist[zzz].className!='wuxiao')
		{
				mylist[zzz].onclick=function(){
					show_attr_status(this, goods_id, attr_id_www_de11_cn);
				}
		}
		var my_input_id = mylist[zzz].id.replace('xuan_a_', 'spec_value_');
		document.getElementById(my_input_id).checked=false;
	}
	var the_input_id = theid.id.replace('xuan_a_', 'spec_value_');
	theid.onclick=function(){}
	document.getElementById(the_input_id).checked="checked";

	var www_de11_cn= theid.parentNode.id.replace('catt_', '');
	 for (iii=0;iii<spec_attr_type.length;iii++ )
	 {
	     selid_www_de11_cn=0;
	     if (spec_attr_type[iii].value != www_de11_cn)
	     {
		var s1=document.getElementById('xuan_'+spec_attr_type[iii].value);
		var s1_list = s1.getElementsByTagName("a");
		for(jjj=0;jjj<s1_list.length;jjj++)
		{	
			s1_a_id = s1_list[jjj].id.replace('xuan_a_','');
			if (is_exist_prod(selected_first, s1_a_id, myString) )
			{					
				if (selid_www_de11_cn)
				{
					if (s1_list[jjj].className == 'cattsel')
					{
						selid_www_de11_cn = s1_a_id;
					}
				}
				else
				{
					selid_www_de11_cn =  s1_a_id;
				}
				s1_list[jjj].className = '';
				s1_list[jjj].onclick=function(){
					show_attr_status(this, goods_id, attr_id_www_de11_cn);
				}
			}
			else
			{
				s1_list[jjj].className = 'wuxiao';
				s1_list[jjj].onclick=function(){}				
			}
			document.getElementById('spec_value_' + s1_a_id).checked = false;
		}
		document.getElementById('spec_value_' + selid_www_de11_cn).checked = "checked";
		selected_first.push(selid_www_de11_cn);
		document.getElementById('xuan_a_'+selid_www_de11_cn).className='cattsel';
		document.getElementById('xuan_a_'+selid_www_de11_cn).onclick=function(){}		
	     }
	}
	changeAtt(theid, goods_id);	
	changePrice();
 }
 function is_exist_prod(selected_first, id, prod_exist_arr)
 {
	if (prod_exist_arr.length == 0)
	{
		return 0;
	}
	var www_de11_cn_selected = selected_first.slice(0);
	www_de11_cn_selected.push(id);	
	var all_valid =0;
	for (var i in prod_exist_arr)
	{
		var first_exist=1;
		for (var j in www_de11_cn_selected)
		{
			if ( prod_exist_arr[i].indexOf("|" + www_de11_cn_selected[j] + "|") =='-1')
			{
				first_exist=0;
				break;
			}
		}
		if(first_exist==1)
		{
			all_valid=1;
			break;
		}
	
	}
	return all_valid;
 }