/** @type {import('next').NextConfig} */
const nextConfig = {
    env:{
        URL_BASE:"http://127.0.0.1:8000",
        PATH_IMG:"/uploads",
        PATH_API:"/api",
        PATH_BLOG:"/blog",
        PATH_BLOG_CATEGORY:"/blog/category",
        PATH_BLOG_DETAIL:"/blog/detail",
        TITLE: "The Easy Tech",
    },
    images:{
        domains: ["127.0.0.1","localhost"]
    }
}

export default nextConfig
