（函数（$）{
  //不区分大小写的jQuery：包含选择器
  $ .expr [“：”]。searchableSelectContains = $ .expr.createPseudo（function（arg）{
    返回函数（elem）{
      返回$（elem）.text（）。toUpperCase（）。indexOf（arg.toUpperCase（））> = 0;
    };
  }）;
   
  /*$.expr[":"].searchableSelectContains = function（obj，index，meta）{  
     返回$（obj）.text（）。toUpperCase（）。indexOf（meta [3] .toUpperCase（））> = 0;
  }; * /
   
 
  $ .searchableSelect = function（element，options）{
    this.element =元素；
    this.options =选项|| {};
    this.init（）;
 
    var _this = this;
 
    this.searchableElement.click（function（event）{
      // event.stopPropagation（）;
      _this.show（）;
    }）。on（'keydown'，function（event）{
      if（event.which === 13 || event.which === 40 || event.which == 38）{
        event.preventDefault（）;
        _this.show（）;
      }
    }）;
 
    $（document）.on（'click'，null，function（event）{
      if（_this.searchableElement.has（$（event.target））。length === 0）
        _this.hide（）;
    }）;
 
    this.input.on（'keydown'，function（event）{
      event.stopPropagation（）;
      if（event.which === 13）{//输入
        event.preventDefault（）;
        _this.selectCurrentHoverItem（）;
        _this.hide（）;
      } else if（event.which == 27）{// ese
        _this.hide（）;
      } else if（event.which == 40）{//向下
        _this.hoverNextItem（）;
      } else if（event.which == 38）{//向上
        _this.hoverPreviousItem（）;
      }
    }）。on（'keyup'，function（event）{
      if（event。哪个！= 13 && event。哪个！= 27 && event。哪个！= 38 && event。哪个！= 40）
        _this.filter（）;
    }）
  }
 
  var $ sS = $ .searchableSelect;
 
  $ sS.fn = $ sS.prototype = {
    版本：“ 0.0.1”
  };
 
  $ sS.fn.extend = $ sS.extend = $ .extend;
 
  $ sS.fn.extend（{
    初始化：function（）{
      var _this = this;
      this.element.hide（）;
 
      this.searchableElement = $（'<div tabindex =“ 0” class =“ searchable-select”> </ div>'）;
      this.holder = $（'<div class =“ searchable-select-holder”> </ div>'）;
      this.dropdown = $（'<div class =“ searchable-select-dropdown searchable-select-hide”> </ div>'）;
      this.input = $（'<input type =“ text” class =“ searchable-select-input” />'）;
      this.items = $（'<div class =“ searchable-select-items”> </ div>'）;
      this.caret = $（'<span class =“ searchable-select-caret”> </ span>'）;
 
      this.scrollPart = $（'<div class =“ searchable-scroll”> </ div>'）;
      this.hasPrivious = $（'<div class =“ searchable-has-privious”> ... </ div>'）;
      this.hasNext = $（'<div class =“ searchable-has-next”> ... </ div>'）;
 
      this.hasNext.on（'mouseenter'，function（）{
        _this.hasNextTimer = null;
 
        var f = function（）{
          var scrollTop = _this.items.scrollTop（）;
          _this.items.scrollTop（scrollTop + 20）;
          _this.hasNextTimer = setTimeout（f，50）;
        }
 
        F（）;
      }）。on（'mouseleave'，function（event）{
        clearTimeout（_this.hasNextTimer）;
      }）;
 
      this.hasPrivious.on（'mouseenter'，function（）{
        _this.hasPriviousTimer = null;
 
        var f = function（）{
          var scrollTop = _this.items.scrollTop（）;
          _this.items.scrollTop（scrollTop-20）;
          _this.hasPriviousTimer = setTimeout（f，50）;
        }
 
        F（）;
      }）。on（'mouseleave'，function（event）{
        clearTimeout（_this.hasPriviousTimer）;
      }）;
 
      this.dropdown.append（this.input）;
      this.dropdown.append（this.scrollPart）;
 
      this.scrollPart.append（this.hasPrivious）;
      this.scrollPart.append（this.items）;
      this.scrollPart.append（this.hasNext）;
 
      this.searchableElement.append（this.caret）;
      this.searchableElement.append（this.holder）;
      this.searchableElement.append（this.dropdown）;
      this.element.after（this.searchableElement）;
 
      this.buildItems（）;
      this.setPriviousAndNextVisibility（）;
    }，
 
    过滤器：function（）{
      var text = this.input.val（）;
      this.items.find（'。searchable-select-item'）。addClass（'searchable-select-hide'）;
      if（text！=''）{
        this.items.find（'。searchable-select-item：searchableSelectContains（'+ text +'）'）。removeClass（'searchable-select-hide'）;
      }其他{
        this.items.find（'。searchable-select-item'）。removeClass（'searchable-select-hide'）; 
      }
      if（this.currentSelectedItem.hasClass（'searchable-select-hide'）&& this.items.find（'。searchable-select-item：not（.searchable-select-hide）'）。length> 0）{
        this.hoverFirstNotHideItem（）;
      }
 
      this.setPriviousAndNextVisibility（）;
    }，
 
    hoverFirstNotHideItem：function（）{
      this.hoverItem（this.items.find（'。searchable-select-item：not（.searchable-select-hide）'）。first（））;
    }，
 
    selectCurrentHoverItem：function（）{
      if（！this.currentHoverItem.hasClass（'searchable-select-hide'））
        this.selectItem（this.currentHoverItem）;
    }，
 
    hoverPreviousItem：function（）{
      if（！this.hasCurrentHoverItem（））
        this.hoverFirstNotHideItem（）;
      其他{
        var prevItem = this.currentHoverItem.prevAll（'。searchable-select-item：not（.searchable-select-hide）：first'）
        if（prevItem.length> 0）
          this.hoverItem（prevItem）;
      }
    }，
 
    hoverNextItem：function（）{
      if（！this.hasCurrentHoverItem（））
        this.hoverFirstNotHideItem（）;
      其他{
        var nextItem = this.currentHoverItem.nextAll（'。searchable-select-item：not（.searchable-select-hide）：first'）
        if（nextItem.length> 0）
          this.hoverItem（nextItem）;
      }
    }，
 
    buildItems：function（）{
      var _this = this;
      this.element.find（'option'）。each（function（）{
        var item = $（'<div class =“ searchable-select-item” data-value =“'+ $（this）.attr（'value'）+'”>'+ $（this）.text（）+ '</ div>'）;
 
        如果（已选择）{
          _this.selectItem（item）;
          _this.hoverItem（item）;
        }
 
        item.on（'mouseenter'，function（）{
          $（this）.addClass（'hover'）;
        }）。on（'mouseleave'，function（）{
          $（this）.removeClass（'hover'）;
        }）。click（function（event）{
          event.stopPropagation（）;
          _this.selectItem（$（this））;
          _this.hide（）;
        }）;
 
        _this.items.append（item）;
      }）;
 
      this.items.on（'scroll'，function（）{
        _this.setPriviousAndNextVisibility（）;
      }）
    }，
    显示：function（）{
      this.dropdown.removeClass（'searchable-select-hide'）;
      this.input.focus（）;
      this.status ='显示';
      this.setPriviousAndNextVisibility（）;
      this.dropdown.css（'z-index'，100）; //镓揿紑涓嬫媺鍒楄〃镞惰性皟楂榸-index灞傜骇
    }，
 
    隐藏：function（）{
      if（！（this.status ==='显示'））
        返回;
 
      if（this.items.find（'：not（.searchable-select-hide）'）。length === 0）
          this.input.val（''）;
      this.dropdown.addClass（'searchable-select-hide'）;
      this.searchableElement.trigger（'focus'）;
      this.status ='隐藏';
      this.dropdown.css（'z-index'，1）; //鍏抽棴涓嬫媺鍒楄〃镞舵仮澶峼-index灞傜骇
    }，
 
    hasCurrentSelectedItem：function（）{
      返回this.currentSelectedItem && this.currentSelectedItem.length> 0;
    }，
 
    selectItem：函数（项）{
      如果（this.hasCurrentSelectedItem（））
        this.currentSelectedItem.removeClass（'selected'）;
 
      this.currentSelectedItem = item;
      item.addClass（'selected'）;
 
      this.hoverItem（item）;
 
      this.holder.text（item.text（））;
      var value = item.data（'value'）;
      this.holder.data（'value'，value）;
      this.element.val（value）;
 
      if（this.options.afterSelectItem）{
        this.options.afterSelectItem.apply（this）;
      }
    }，
 
    hasCurrentHoverItem：function（）{
      返回this.currentHoverItem && this.currentHoverItem.length> 0;
    }，
 
    hoverItem：函数（项）{
      如果（this.hasCurrentHoverItem（））
        this.currentHoverItem.removeClass（'hover'）;
 
      if（item.outerHeight（）+ item.position（）。top> this.items.height（））
        this.items.scrollTop（this.items.scrollTop（）+ item.outerHeight（）+ item.position（）。top-this.items.height（））;
      否则if（item.position（）。top <0）
        this.items.scrollTop（this.items.scrollTop（）+ item.position（）。top）;
 
      this.currentHoverItem = item;
      item.addClass（'hover'）;
    }，
 
    setPriviousAndNextVisibility：function（）{
      if（this.items.scrollTop（）=== 0）{
        this.hasPrivious.addClass（'searchable-select-hide'）;
        this.scrollPart.removeClass（'has-privious'）;
      }其他{
        this.hasPrivious.removeClass（'searchable-select-hide'）;
        this.scrollPart.addClass（'has-privious'）;
      }
 
      if（this.items.scrollTop（）+ this.items.innerHeight（）> = this.items [0] .scrollHeight）{
        this.hasNext.addClass（'searchable-select-hide'）;
        this.scrollPart.removeClass（'has-next'）;
      }其他{
        this.hasNext.removeClass（'searchable-select-hide'）;
        this.scrollPart.addClass（'has-next'）;
      }
    }
  }）;
 
  $ .fn.searchableSelect = function（options）{
    this.each（function（）{
      var sS = new $ sS（$（this），options）;
    }）;
 
    返回这个
  };
 
}）（jQuery）;