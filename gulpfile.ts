import {watch,parallel, task} from "gulp";
import  {create} from "browser-sync"
import { TaskCallback } from "undertaker";

function sync(cb: TaskCallback) {
   let browser_sync=create()
 browser_sync.init({
    proxy:"smile-now.local",
    files:"**/*",
   
    });
    watch("**/*").on('change',(c)=>{browser_sync.reload()})
    cb()
    
}
task('watch',(cb)=>sync(cb))

// export const build = parallel((cb)=>{sync(cb)})


