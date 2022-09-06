import {watch,parallel, task,src, dest, series} from "gulp";
import  {create} from "browser-sync"
import { TaskCallback } from "undertaker";
// import del from 'del'
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);


let browser_sync=create()
function sync(cb: TaskCallback) {
  
 browser_sync.init({
    proxy:"smile-now.local",   
    });
    watch("**/*\.(php|ts|js|css|html)").on('change',()=>{browser_sync.reload()})
    cb()
    
}
const styles=() => {
    return src('./scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('.'));;
}

// task('clean', () => {
//     return del.deleteAsync([
//         'css/main.css',
//     ]);
// });

task('watch',parallel([(cb)=>{sync(cb)},(cb)=>{styles();watch("**/*\.(scss)").on('change',(cb)=>{styles()})}]))

// export const build = parallel((cb)=>{sync(cb)})


